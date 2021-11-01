@extends('user.master-user')
@section('page-css')
    <meta name="orderId" content="{{$order->id}}">
    <link rel="stylesheet" type="text/css" href="/user/vendor/lightbox2/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="/user/vendor/noui/nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="/user/css/util.css">
    <link rel="stylesheet" type="text/css" href="/user/css/main.css">
    <style>
        .p-b-23 div .cl6 {
            font-size: 18px;
        }
        .p-b-23 div p {
            font-size: 16px;
        }
        .col-md-5 div .flex-w{
            font-size: 17px;

        }
        .col-md-5 div .flex-w span:first-child{
            word-break: break-word;
            width: 60%;

        }
    </style>
@endsection
@section('content')

    <!-- Title page -->
    @include('user.include.title', ['page'=>'Checkout'])

    <!-- content page -->
    <div class="bg0 p-t-95 p-b-50">
        <div class="container">
            <div id="messageCheckout"></div>
            <div class="row">

                <div class="col-md-7 col-lg-8 p-b-30">
                    <div>
                        <h4 class="txt-m-124 cl3 p-b-28">
                            Billing details confirm
                        </h4>

                        <div class="row p-b-50">

                            <div class="col-12 p-b-23">
                                @if($order->check_out)
                                    <div class="alert alert-success">Payment success
                                    </div>
                                @else
                                    <div class="alert alert-danger">Unpaid
                                    </div>
                                @endif
                                <div>
                                    <div class="txt-s-101 cl6 p-b-10">
                                        Full name <span class="cl12">*</span>
                                    </div>
                                    <p class="txt-s-115 cl3 size-a-21  bocl15 p-rl-20 focus1">
                                        {{$order->ship_name}}
                                    </p>
                                </div>

                            </div>

                            <div class="col-12 p-b-23">
                                <div>
                                    <div class="txt-s-101 cl6 p-b-10">
                                        Address <span class="cl12">*</span>
                                    </div>

                                    <p class="txt-s-115 cl3 size-a-21  bocl15 p-rl-20 focus1">
                                        {{$order->ship_address}}
                                    </p>
                                </div>

                            </div>

                            <div class="col-sm-6 p-b-23">
                                <div>
                                    <div class="txt-s-101 cl6 p-b-10">
                                        Phone :
                                    </div>

                                    <p class="txt-s-115 cl3 size-a-21  bocl15 p-rl-20 focus1">
                                        {{$order->ship_phone}}
                                    </p>
                                </div>

                            </div>

                            <div class="col-sm-6 p-b-23">
                                <div>
                                    <div class="txt-s-101 cl6 p-b-10">
                                        Email :
                                    </div>

                                    <p class="txt-s-115 cl3 size-a-21  bocl15 p-rl-20 focus1">
                                        {{$order->ship_email}}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <h4 class="txt-m-124 cl3 p-b-19">
                            Additional information
                        </h4>

                        <div>
                            <div style="font-size: 18px" class="txt-s-101 cl6 p-b-10">
                                Order notes:
                            </div>
                            <p class="txt-s-115 cl3 size-a-21  bocl15 p-rl-20 focus1" style="font-size: 16px">
                                {{$order->ship_note}}
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-lg-4 p-b-50">
                    <div class="how-bor4 p-t-35 p-b-40 p-rl-30 m-t-5">
                        <h4 class="txt-m-124 cl3 p-b-11">
                            Your order
                        </h4>

                        <div class="flex-w flex-sb-m txt-m-103 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
							<span>
								Product
							</span>

                            <span>
								Total <small>(VND)</small>
							</span>
                        </div>

                        <!-- Products  -->
                        @if(isset($order))
                            @foreach($order->orderDetails as $item)
                                <div class="flex-w flex-sb-m txt-s-101 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
							<span>
								{{$item->products->name}}  <b class="cl10 ml-2">x{{$item->quantity}}</b>
							</span>

                                    <span>
								{{\App\util\Util::formatPriceToVnd($item->products->price)}}
							</span>
                                </div>
                            @endforeach
                        @endif

                    <!--  -->
                        <div class="flex-w flex-sb-m txt-m-103 bo-b-1 bocl15 p-tb-23">
							<span class="size-w-61 cl6">
								Subtotal
							</span>

                            <span>
								{{\App\util\Util::formatPriceToVnd($order->total_price) ?? ''}}
							</span>
                        </div>

                        <div class="flex-w flex-sb-m txt-m-103 p-tb-23 mb-3">
                            <input type="hidden" name="total_price" value="{{$total ?? ''}}">
                            <span class="size-w-61 cl6">
								Total
							</span>
                            <span>
								{{\App\util\Util::formatPriceToVnd($order->total_price) ?? ''}}
							</span>
                        </div>
                        <div class="flex-w flex-sb-m txt-m-103 mb-3 dis-flex justify-content-center">
                            <span class="size-w-61 cl6">
								Total(USD)
							</span>
                            <span class="mb-2">~  <small>$</small>{{ $totalPriceUsd ?? ""}}</span>
                            <p>Dollar rate today: <small>$</small>1 ~ 24000 <small>VND</small></p>
                        </div>

                        @if(!($order->check_out))
                            <div id="paypal-button"></div>
                        @endif
                            <a href="/shop" style="color: #FFFF; border-radius: 20px"
                               class="flex-c-m txt-s-105 cl0 bg10 size-a-21 hov-btn2 trans-04 p-rl-10 mt-3">
                                Shopping continue
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Logo -->
    @include('user.include.logo')

@endsection
@section('page-script')
    {{--    <script src="/user/vendor/lightbox2/js/lightbox.min.js"></script>--}}
    <!--===============================================================================================-->
    <script src="/user/vendor/noui/nouislider.min.js"></script>
    <!--===============================================================================================-->
    <script src="/user/js/main.js"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        var orderId = document.querySelector("meta[name=orderId]").content;
        paypal.Button.render({
            env: 'sandbox', // Or 'production'
            style: {
                size: 'responsive',
                color: 'gold',
                shape: 'pill',
            },
            // Set up the payment:
            // 1. Add a payment callback
            payment: function (data, actions) {
                // 2. Make a request to your server
                return actions.request.post('/cart/create-payment', {
                    orderId: orderId
                })
                    .then(function (res) {
                        // 3. Return res.id from the response
                        return res.id;
                    });
            },
            // Execute the payment:
            // 1. Add an onAuthorize callback
            onAuthorize: function (data, actions) {
                // 2. Make a request to your server
                return actions.request.post('/cart/execute-payment', {
                    paymentID: data.paymentID,
                    payerID: data.payerID,
                    orderId: orderId
                })
                    .then(function (res) {
                        console.log(res);
                        // 3. Show the buyer a confirmation message.
                        $('#messageCheckout').html(`<p class="alert-success alert">Thanh toán thành công</p>`)
                        setTimeout(function () {
                            window.location.reload(false)
                        },2000)
                    });
            }
        }, '#paypal-button');
    </script>
@endsection
