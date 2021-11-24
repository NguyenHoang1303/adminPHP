@extends('user.master-user')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="/user/vendor/lightbox2/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="/user/vendor/noui/nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="/user/css/util.css">
    <link rel="stylesheet" type="text/css" href="/user/css/main.css">
    <style>
        .delete-cart:before {
            content: '';
            background-color: yellow;
            height: 2px;
            color: red;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')

    <!-- Title page -->
    @include('user.include.title', ['page'=>'Cart'])

    <!-- content page -->
    <div class="bg0 p-tb-100">
        <div class="container">
            <div class="wrap-table-shopping-cart position-relative">
                <table class="table-shopping-cart">
                    <tr class="table_head bg12">
                        <th class="column-1 p-l-30">Product</th>
                        <th class="column-2">Price <small>(VND)</small></th>
                        <th style="width: 15%" class="column-3">Quantity</th>
                        <th style="width: 15%" class="column-4">Total <small>(VND)</small></th>
                        <th style="width: 15%" class="column-4">Action</th>
                    </tr>
                    @php $total = 0 @endphp
                    @if(session()->has('cart'))
                        <?php $total = 0?>
                        @foreach($cart as $item)
                            @php
                                if (isset($total) & isset($item)) {
                                    $total += $item->unitPrice * $item->quantity;
                                    }
                            @endphp
                            <form action="/cart/update" method="post">
                                @csrf
                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="flex-w flex-m">
                                            <div class="wrap-pic-w size-w-50 bo-all-1 bocl12 m-r-30">
                                                <img src="{{$item->thumbnail}}" alt="IMG">
                                            </div>

                                            <span>
										{{$item->name}}
									</span>
                                        </div>
                                    </td>
                                    <td class="column-2">
                                        {{\App\util\Util::formatPriceToVnd($item->unitPrice)}}
                                    </td>
                                    <td class="column-3">
                                        <div class="wrap-num-product flex-w flex-m bg12 p-rl-10">
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <div class="btn-num-product-down flex-c-m fs-29 "></div>

                                            <input class="txt-m-102 cl6 txt-center num-product " type="number" min="1"
                                                   name="quantity" value="{{$item->quantity}}">

                                            <div class="btn-num-product-up flex-c-m fs-16 "></div>
                                        </div>
                                    </td>
                                    <td class="column-4 ">
                                        <div class="flex-w flex-sb-m">
									<span>
										{{\App\util\Util::formatPriceToVnd($item->unitPrice * $item->quantity)}}
									</span>

                                            <div class="fs-15 hov-cl10 pointer">
                                                <span class="lnr lnr-cross"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-4">
                                        <div class="dis-flex position-relative">
                                            <button
                                                class="mr-1 delete-cart flex-c-m txt-s-105 cl0 bg10 p-1 hov-btn2 trans-04 pointer">
                                                Update Cart
                                            </button>
                                            <a href="/cart/delete/{{$item->id}}"
                                               class=" ml-2 pt-1"
                                               style="border-radius: 2px; font-size: 14px; color: #a7a7a8">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    @else
                        <div class="text-center alert alert-info">
                            <p>Cart is empty, please <a href="/shop">CLICK HERE</a> to select the product you want
                                to buy.</p>
                        </div>
                    @endif
                </table>
            </div>

            {{--            <div class="flex-w flex-sb-m p-t-20">--}}

            {{--            </div>--}}


            <div class="flex-col-l p-t-68">
					<span class="txt-m-123 cl3 p-b-18">
						CART TOTALS
					</span>

                <div class="flex-w flex-m bo-b-1 bocl15 w-full p-tb-18">
						<span class="size-w-58 txt-m-109 cl3">
							Subtotal
						</span>

                    <span class="size-w-59 txt-m-104 cl6">
							{{session()->has('cart') ? \App\util\Util::formatPriceToVnd($total) : '0'}} <small>VND</small>
						</span>
                </div>

                <div class="flex-w flex-m bo-b-1 bocl15 w-full p-tb-18">
						<span class="size-w-58 txt-m-109 cl3">
							Total
						</span>

                    <span class="size-w-59 txt-m-104 cl10">
							{{session()->has('cart') ? \App\util\Util::formatPriceToVnd($total) : '0'}} <small>VND</small>
						</span>
                </div>

                <div class="dis-flex">
                    <a href="/cart/checkout"
                       class="flex-c-m txt-s-105 cl0 bg10 size-a-34 hov-btn2 trans-04 p-rl-10 m-t-43 mr-3">
                        proceed to checkout
                    </a>
                    <a href="/shop" style="color: #FFF;"
                       class="flex-c-m txt-s-105 cl0 bg11 size-a-34 hov-btn2 trans-04 p-rl-10 m-t-43">
                        Continue Shopping
                    </a>
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
    <script>
        $('#sort').change(function () {
            this.form.submit();
        })
        $('.checkbox').on('change', function () {
            this.form.submit();
        })

        $('.add-to-cart').prop("onclick", null).off("click");

    </script>
@endsection
