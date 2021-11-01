<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
   public function getOrders(){
       $paginate = 9;
       return view('admin.template.order.orders',[
           'orders'=> Order::orderBy('created_at','desc')->paginate($paginate),
           'sumOrder'=> Order::count(),
           'paginate'=> $paginate,
       ]);
   }

   public function delete($id){
       try {
           $order = Order::find($id);
           if (!$order->exists()) {
               session()->flash('findFail', 'Error! An error occurred. Please try again later.');
               return redirect()
                   ->back();
           }
           $order->status = OrderStatus::Deleted;
           $order->deleted_at = Carbon::now('Asia/Ho_Chi_Minh');
           $order->save();
           session()->flash('delete','Delete product success.');
           return redirect()->back();

       }catch (\Exception $e){
           session()->flash('deleteFail',"Delete fail, please try again later.");
           return redirect()
               ->back();
       }
   }

   public function getInformationOrder($id){
       return view('admin.template.order.order-detail',[
           'order'=>Order::find($id),
       ]);
   }
    public function updateStatus(){
        try {
            $order = Order::find(request()->get('id'));
            if (!$order->exists()) {
                session()->flash('findFail', 'Error! An error occurred. Please try again later.');
                return redirect()
                    ->back();
            }
            $order->status = request()->get('status');
            $order->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
            $order->save();
            session()->flash('update','Update product success.');
            return redirect()->back();
        }catch (\Exception $e){
            session()->flash('updateFail',"Update fail, please try again later.");
            return redirect()->back();
        }
    }

    public function search(Request $request){
        try {
            $paginate = 9;
            $order = Order::searchByInformation()
                ->sortByInformation()
                ->filterPrice();
//            return $request->get('sortName');
            return view('admin.template.order.orders', [
                'orders' => $order->paginate($paginate),
                'oldName' => $request->get('name'),
                'oldId' => $request->get('id'),
                'oldPhone' => $request->get('phone'),
                'oldEmail' => $request->get('email'),
                'oldStatus' => $request->get('status'),
                'oldPayment' => $request->get('payment'),
                'oldCreated_at' => $request->get('created_at'),
                'oldMinPrice' => $request->get('minPrice'),
                'oldMaxPrice' => $request->get('maxPrice'),
                'paginate' => $paginate,
                'sumOrder' => $order->count(),
                'sortPrice' => $request->get('sortPrice'),
                'sortName' => $request->get('sortName'),
            ]);
        }catch (\Exception $e){
            return $e;
            session()->flash('findFail','Not fail product.');
            return redirect()->back();
        }
    }
}
