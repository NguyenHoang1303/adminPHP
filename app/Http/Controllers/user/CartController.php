<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\util\Util;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use stdClass;

class CartController extends Controller
{
    public function addToCart($id)
    {

        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }

        if (array_key_exists($id, $cart)) {
            // nếu có sản phẩm rồi thì update số lượng
            $existingCartItem = $cart[$id];
            // tăng số lượng theo số lượng cần mua thêm.
            $existingCartItem->quantity += 1;
            // và lưu lại vào đối tượng shopping cart.
            $cart[$id] = $existingCartItem;
        } else {
            $cartItem = new stdClass();
            $cartItem->id = $product->id;
            $cartItem->name = $product->name;
            $cartItem->unitPrice = $product->price;
            $cartItem->thumbnail = $product->firstImage;
            $cartItem->quantity = 1;
            $cart[$id] = $cartItem;
        }
        session()->put('cart', $cart);
        session()->flash('addCart', 'Add to cart success.');
        return redirect()->back();
    }

    public function delete($id)
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            if (array_key_exists($id, $cart)) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }
        return redirect()->back();
    }

    public function shopCart()
    {
        $cart = [];
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }

        return view('user.template.shop-cart-page', [
            'cart' => $cart
        ]);
    }

    public function updateCart(Request $request)
    {
        $quantity = $request->get('quantity');
        $id = $request->get('id');

        if ($quantity <= 0) {
            return "fail";
        }
        $obj = Product::find($id);
        if (!isset($obj)) {
            return "fail";
        }
//        if ($obj->staus != 1){
//            return "het hang";
//        }
        $cart = [];
        // nếu có shopping cart rồi thì lấy ra
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }
        // kiểm tra sản phẩm có tồn tại trong giỏ hàng không.
        if (array_key_exists($id, $cart)) {
            // nếu có sản phẩm rồi thì update số lượng
            $existingCartItem = $cart[$id];
            // tăng số lượng theo số lượng cần mua thêm.
            $existingCartItem->quantity = $quantity;
            // và lưu lại vào đối tượng shopping cart.
            $cart[$id] = $existingCartItem;
        }
        // update thông tin shopping cart vào session.
        session()->put('cart', $cart);
        return redirect('cart/show');
    }

    function getFormCheckout()
    {
        $cart = [];
        if (session()->has('cart')) {
            $cart = session()->get('cart');
        }
        $total = 0;
        foreach ($cart as $item) {
            $total += $item->unitPrice * $item->quantity;
        }

        return view('user.template.checkout', [
            'cart' => $cart,
            'total' => $total
        ]);
    }

    function checkout(CheckoutRequest $request)
    {
        $cart = [];
        if (session()->has('cart')) {
            $cart = session('cart');
        }
        if (sizeof($cart) == 0) {
            return view('user.template.error', [
                'error' => "Please choose some product to product order",
            ]);
        }

        $hasError = false;
        $listOrderDetail = [];
        $totalPriceOder = 0;
        foreach ($cart as $item) {
            if (Product::find($item->id) == null) {
                $hasError = true;
                break;
            }
            $totalPriceOder += $item->unitPrice * $item->quantity;
            array_push($listOrderDetail, $this->createOrderDetail($item));
        }
        $order = $this->createOrder();
        $order->total_price = $totalPriceOder;

        if ($hasError) {
            return view('user.template.error', [
                'error' => "Product is not fount or has been deleted"
            ]);
        }
        try {
            DB::beginTransaction();
            $order->save();
            $order_id = $order->id;
            $order_detail = [];
            foreach ($listOrderDetail as $orderDetail) {
                $order_detail[] = [
                    'product_id' => $orderDetail->product_id,
                    'quantity' => $orderDetail->quantity,
                    'unit_price' => $orderDetail->unit_price,
                    'total_price' => $orderDetail->unit_price * $orderDetail->quantity,
                    'order_id' => $order_id,
                ];
            }
            OrderDetail::insert($order_detail);
            DB::commit();
            $this->sendMail($order_id);
            session()->remove('cart');

            return redirect("/cart/confirm-order/$order_id");
        } catch (\Exception $e) {
            DB::rollBack();
            return view('user.template.error', [
                'error' => "Please choose some product to product order",
            ]);
        }
    }

    public function createOrder()
    {
        $order = new Order();
        $order->ship_name = request()->get('ship_name');
        $order->check_out = false;
        $order->user_id = 1;
        $order->ship_address = request()->get('ship_address');
        $order->ship_phone = request()->get('ship_phone');
        $order->ship_email = request()->get('ship_email');
        $order->ship_note = request()->get('ship_note');
        return $order;
    }

    public function createOrderDetail($item)
    {
        $orderDetail = new OrderDetail();
        $orderDetail->product_id = $item->id;
        $orderDetail->quantity = $item->quantity;
        $orderDetail->unit_price = $item->unitPrice;
        $orderDetail->total_price = $item->unitPrice * $item->quantity;

        return $orderDetail;
    }

    public function confirm($id)
    {
        $order = Order::find($id);
        $totalPriceUsd = 0;
        foreach ($order->orderDetails as $orderDetail) {
            $totalPriceUsd += Util::convertVndToUsd($orderDetail->unit_price) * $orderDetail->quantity;
        }
        return view('user.template.confirm', [
            'order' => $order,
            'totalPriceUsd' => $totalPriceUsd,
        ]);
    }

    public function creatPayment(Request $request)
    {
        $orderId = $request->get('orderId');
        $order = Order::find($orderId);
        if ($order == null) {
            return view('user.template.error', [
                'error' => "Please choose some product to product order",
            ]);
        }

        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                env('PAYPAL_SANDBOX_CLIENT_ID'),
                env('PAYPAL_SANDBOX_SECRET_ID'),
            )
        );

        $apiContext->setConfig([
            'mode' => 'sandbox',
        ]);

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $arrayItem = [];
        $totalOrder = 0;
        foreach ($order->orderDetails as $orderDetail) {
            $item = new Item();
            $unitPrice = Util::convertVndToUsd($orderDetail->unit_price);
            $totalOrder += $unitPrice * $orderDetail->quantity;
            $item->setName($orderDetail->products->name)
                ->setCurrency('USD')
                ->setQuantity($orderDetail->quantity)
                ->setSku($orderDetail->product_id)
                ->setPrice($unitPrice);
            array_push($arrayItem, $item);
        }

        $itemList = new ItemList();
        $itemList->setItems($arrayItem);
        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($totalOrder);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($totalOrder)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment success")
            ->setInvoiceNumber($order->id);


        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("http://localhost:8000/shop")
            ->setCancelUrl("http://localhost:8000/cart/cancel");

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($apiContext);
        } catch (Exception $ex) {
            exit(1);
        }

        return $payment;
    }

    public function executePayment()
    {

        $orderId = request()->get('orderId');
        $order = Order::find($orderId);
        if ($order == null) {
            return view('user.template.error', [
                'error' => "Please choose some product to product order",
            ]);
        }

        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                env('PAYPAL_SANDBOX_CLIENT_ID'),
                env('PAYPAL_SANDBOX_SECRET_ID'),
            )
        );

        $apiContext->setConfig([
            'mode' => 'sandbox',
        ]);
        $paymentId = request()->get('paymentID');
        $payerId = request()->get('payerID');


        $payment = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {

            $payment->execute($execution, $apiContext);
            try {
                $payment = Payment::get($paymentId, $apiContext);
                $order->check_out = true;
                $order->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
                $order->save();
            } catch (Exception $ex) {
                exit(1);
            }
        } catch (Exception $ex) {
            exit(1);
        }
        return $payment;
    }

    function sendMail($id)
    {
        $data = Order::find($id);
        Mail::send('admin.template.mail', ['data' => $data ],
            function ($message) use ($data) {
            $message->to( $data->ship_email, 'Tutorials Point')
                ->subject("Order #$data->id created successfully");
            $message->from('rausachtdhhn@gmail.com', 'RausachHN');
        });
    }
}
