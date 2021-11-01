@extends('user.master-user')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="/user/vendor/lightbox2/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="/user/vendor/noui/nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="/user/css/util.css">
    <link rel="stylesheet" type="text/css" href="/user/css/main.css">
    <style>
        .p-b-23 div .cl6 {
            font-size: 18px;
        }
        .p-b-23 div input {
            font-size: 16px;
        }
        .txt-m-124 div .cl6{
            font-size: 18px;
        }
        .txt-m-124 div textarea{
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
            <!-- Login -->
            <form action="/cart/checkout" method="post">
                @csrf
            <div class="row">

                <div class="col-md-7 col-lg-8 p-b-30">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="col-md-5 col-sm-5">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div>
                        <h4 class="txt-m-124 cl3 p-b-28">
                            Billing details
                        </h4>

                        <div class="row p-b-50">
                            <div class="col-12 p-b-23">
                                <div>
                                    <div class="txt-s-101 cl6 p-b-10">
                                        Full name <span class="cl12">*</span>
                                    </div>
                                    <input class="plh2 txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1 m-b-20"
                                           type="text" name="ship_name" placeholder="Full name">
                                </div>
                                @error('ship_name')
                                <span class="text-danger">* {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 p-b-23">
                                <div>
                                    <div class="txt-s-101 cl6 p-b-10">
                                        Address <span class="cl12">*</span>
                                    </div>

                                    <input class="plh2 txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1 m-b-20"
                                           type="text" name="ship_address" placeholder="Address">
                                </div>
                                @error('ship_address')
                                <span class="text-danger">* {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-6 p-b-23">
                                <div>
                                    <div class="txt-s-101 cl6 p-b-10">
                                        Phone <span class="cl12">*</span>
                                    </div>

                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text"
                                         placeholder="Phone number"  name="ship_phone">
                                </div>
                                @error('ship_phone')
                                <span class="text-danger">* {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-6 p-b-23">
                                <div>
                                    <div class="txt-s-101 cl6 p-b-10">
                                        Email Address <span class="cl12">*</span>
                                    </div>

                                    <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text"
                                          placeholder="Email" name="ship_email">
                                </div>
                                @error('ship_email')
                                <span class="text-danger">* {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <h4 class="txt-m-124 cl3 p-b-19">
                            Additional information
                        </h4>

                        <div>
                            <div style="font-size: 18px" class=" cl6 p-b-10">
                                Order notes:
                            </div>

                            <textarea style="font-size: 16px" class="plh2  cl3 size-a-38 bo-all-1 bocl15 p-rl-20 p-tb-10 focus1"
                                      name="ship_note"
                                      value=""
                                      placeholder="Note about your order, eg. special notes fordelivery."></textarea>
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
                        @if(isset($cart))
                            @foreach($cart as $item)
                            <div class="flex-w flex-sb-m txt-s-101 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
							<span>
								{{$item->name}}  <b class="cl10 ml-2">x{{$item->quantity}}</b>
							</span>

                                <span>
								{{\App\util\Util::formatPriceToVnd($item->unitPrice)}}
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
								{{\App\util\Util::formatPriceToVnd($total) ?? ''}}
							</span>
                        </div>

                        <div class="flex-w flex-sb-m txt-m-103 p-tb-23">
                            <input type="hidden" name="total_price" value="{{$total}}">
							<span class="size-w-61 cl6">
								Total
							</span>

                            <span>
								{{\App\util\Util::formatPriceToVnd($total) ?? ''}}
							</span>
                        </div>

                        <button class="flex-c-m txt-s-105 cl0 bg10 size-a-21 hov-btn2 trans-04 p-rl-10">
                            Place order
                        </button>
                    </div>
                </div>
            </div>
            </form>
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
    <script>

    </script>
@endsection
