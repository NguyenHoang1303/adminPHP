@extends('user.master-user')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="/user/vendor/lightbox2/css/lightbox.min.css">

    <link rel="stylesheet" type="text/css" href="/user/vendor/noui/nouislider.min.css">
@endsection
@section('content')

    <!-- Title page -->
    @include('user.include.title', ['page'=>'Products'])

    <!-- Content page -->
    <section class="bg0 p-t-85 p-b-45">
        <div class="container">
            <form action="/product/search" method="get">
                <div class="row">
                    <div class="col-sm-10 col-md-4 col-lg-3 m-rl-auto p-b-50">
                        <div class="leftbar p-t-15">
                                @csrf
                                <div class="size-a-21 pos-relative">
                                    <!-- SEARCH BY NAME -->
                                    <input class="s-full bo-all-1 bocl15 p-rl-20"
                                           type="text" name="query" value="{{$oldQuery ?? ""}}"
                                           placeholder="Tìm kiếm sản phẩm...">
                                    <button class="flex-c-m fs-18 size-a-22 ab-t-r hov11">
                                        <img class="hov11-child trans-04" src="/user/images/icons/icon-search.png" alt="ICON">
                                    </button>
                                </div>

                            <!-- FILTER BY PRICE -->
                        {{--                        <div class="p-t-45">--}}
                        {{--                            <h4 class="txt-m-101 cl3">--}}
                        {{--                                FILTER BY PRICE--}}
                        {{--                            </h4>--}}

                        {{--                            <div class="filter-price p-t-32">--}}
                        {{--                                <div class="wra-filter-bar">--}}
                        {{--                                    <div id="filter-bar"></div>--}}
                        {{--                                </div>--}}

                        {{--                                <div class="flex-sb-m flex-w p-t-16">--}}
                        {{--                                    <div class="txt-s-115 cl9 p-t-10 p-b-10 m-r-20">--}}
                        {{--                                        Price: $<span id="value-lower">8</span> - $<span id="value-upper">20</span>--}}
                        {{--                                    </div>--}}

                        {{--                                    <div>--}}
                        {{--                                        <a href="#" class="txt-s-107 cl6 hov-cl10 trans-04">--}}
                        {{--                                            Filter--}}
                        {{--                                        </a>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <!--  -->
                            <div class="p-t-40">
                                <h4 class="txt-m-101 cl3 p-b-37">
                                    Categories
                                </h4>

                                <ul>
                                    @foreach($categories as $category)
                                        <li class="p-b-5">
                                            <a class=" flex-sb-m flex-w txt-s-101 cl6 hov-cl10 trans-04 p-tb-3">
                                                <span style="width: 50%" class="m-r-10">{{$category->name}}</span>
                                                <span>{{$category->products_count}}</span>
                                                <input name="category" class="checkbox"
                                                       {{isset($oldCategory) && $oldCategory == $category->id ? 'checked':""}}
                                                       type="checkbox" value="{{$category->id}}">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!--  -->
                            <div class="p-t-40">
                                <h4 class="txt-m-101 cl3 p-b-37">
                                    Best sellers
                                </h4>

                                <ul>
                                    <li class="flex-w flex-sb-t p-b-30">
                                        <a href="#" class="size-w-50 wrap-pic-w bo-all-1 bocl12 hov8 trans-04">
                                            <img src="/user/images/best-sell-01.jpg" alt="IMG">
                                        </a>

                                        <div class="size-w-51 flex-col-l p-t-12">
                                            <a href="#" class="txt-m-103 cl3 hov-cl10 trans-04 p-b-12">
                                                Cheery
                                            </a>

                                            <span class="txt-m-104 cl9">
											30$
										</span>
                                        </div>
                                    </li>

                                    <li class="flex-w flex-sb-t p-b-30">
                                        <a href="#" class="size-w-50 wrap-pic-w bo-all-1 bocl12 hov8 trans-04">
                                            <img src="/user/images/best-sell-02.jpg" alt="IMG">
                                        </a>

                                        <div class="size-w-51 flex-col-l p-t-12">
                                            <a href="#" class="txt-m-103 cl3 hov-cl10 trans-04 p-b-12">
                                                Asparagus
                                            </a>

                                            <span class="txt-m-104 cl9">
											12$
										</span>
                                        </div>
                                    </li>

                                    <li class="flex-w flex-sb-t p-b-30">
                                        <a href="#" class="size-w-50 wrap-pic-w bo-all-1 bocl12 hov8 trans-04">
                                            <img src="/user/images/best-sell-03.jpg" alt="IMG">
                                        </a>

                                        <div class="size-w-51 flex-col-l p-t-12">
                                            <a href="#" class="txt-m-103 cl3 hov-cl10 trans-04 p-b-12">
                                                Eggplant
                                            </a>

                                            <span class="txt-m-104 cl9">
											18$
										</span>
                                        </div>
                                    </li>

                                    <li class="flex-w flex-sb-t p-b-30">
                                        <a href="#" class="size-w-50 wrap-pic-w bo-all-1 bocl12 hov8 trans-04">
                                            <img src="/user/images/best-sell-04.jpg" alt="IMG">
                                        </a>

                                        <div class="size-w-51 flex-col-l p-t-12">
                                            <a href="#" class="txt-m-103 cl3 hov-cl10 trans-04 p-b-12">
                                                Carrot
                                            </a>

                                            <span class="txt-m-104 cl9">
											17$
										</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-8 col-lg-9 m-rl-auto p-b-50">
                        <div>
                            <div class="flex-w flex-r-m p-b-45 flex-row-rev">
                                <div class="flex-w flex-m p-tb-8">

                                    <div class="rs1-select2 bg0 size-w-52 bo-all-1 bocl15 m-tb-7 m-r-15" >

                                        <select class="js-select2" name="sort" id="sort">
                                            <option value="-1">---Sắp xếp theo--- </option>
                                            <option value="nameAsc" {{isset($sort) && $sort == "nameAsc" ? "selected": ""}}>Tên sản phẩm a-z</option>
                                            <option value="nameDesc" {{isset($sort) && $sort == "nameDesc" ? "selected": ""}}>Tên sản phẩm z-a</option>
                                            <option value="priceAsc" {{isset($sort) && $sort == "priceAsc" ? "selected": ""}}>Giá từ thấp tới cao</option>
                                            <option value="priceDesc" {{isset($sort) && $sort == "priceDesc" ? "selected": ""}}>Giá từ cao tới thấp</option>
                                        </select>

                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>

                                <span class="txt-s-101 cl9 m-r-30 size-w-53">
								Hiển thị 1–{{$limit}} trong {{$sumProduct}} sản phẩm
							</span>
                            </div>

                            <!-- Shop grid -->
                            <div class="shop-grid">
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="col-sm-6 col-lg-4 p-b-30">
                                            <!-- Block1 -->
                                            <div class="block1">
                                                <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                                    <img src="{{explode(',',$product->thumbnail)[0]}}" alt="IMG">
                                                    <div class="block1-content flex-col-c-m p-b-46">
                                                        <a href="/shop/detail/{{$product->id}}"
                                                           class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                                            {{$product->name}}
                                                        </a>

                                                        <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
													{{number_format($product->price,0, ',', ' ')}} <small>vnđ</small>
												</span>

                                                        <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                                            <a href="/shop/detail/{{$product->id}}"
                                                               class="block1-icon flex-c-m wrap-pic-max-w">
                                                                <img src="/user/images/icons/icon-view.png" alt="ICON">
                                                            </a>

                                                            <a href="#"
                                                               class="block1-icon flex-c-m wrap-pic-max-w js-addcart-b1">
                                                                <img src="/user/images/icons/icon-cart.png" alt="ICON">
                                                            </a>

                                                            <a href="wishlist.html"
                                                               class="block1-icon flex-c-m wrap-pic-max-w js-addwish-b1">
                                                                <img class="icon-addwish-b1"
                                                                     src="/user/images/icons/icon-heart.png"
                                                                     alt="ICON">
                                                                <img class="icon-addedwish-b1"
                                                                     src="/user/images/icons/icon-heart2.png"
                                                                     alt="ICON">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div class="flex-w flex-c-m p-t-47">
                                {{$products->links('user.include.pagination')}}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>


    <!-- Logo -->
    <div class="sec-logo bg0">
        <div class="container">
            <div class="flex-w flex-sa-m bo-t-1 bocl13 p-tb-60">
                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="/user/images/icons/symbol-07.png" alt="IMG">
                </a>

                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="/user/images/icons/symbol-08.png" alt="IMG">
                </a>

                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="/user/images/icons/symbol-09.png" alt="IMG">
                </a>

                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="/user/images/icons/symbol-10.png" alt="IMG">
                </a>

                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="/user/images/icons/symbol-11.png" alt="IMG">
                </a>
            </div>
        </div>
    </div>

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
        $('.checkbox').on('change',function () {
            this.form.submit();
        })

    </script>
@endsection
