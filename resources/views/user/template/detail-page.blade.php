@extends('user.master-user')
@section('page-css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="/user/vendor/lightbox2/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="/user/vendor/noui/nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="/user/vendor/slide100/slide100.css">
{{--    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>--}}
@endsection
@section('content')
    <!-- Title page -->
    @include('user.include.title', ['page'=>'Products / Detail'])

    <!-- Product detail -->
    <section class="sec-product-detail bg0 p-t-105 p-b-70">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-6">
                    <div class="m-r--30 m-r-0-lg">
                        <!-- Slide 100 -->
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @php
                                  $list = explode(',',$product->thumbnail);
                                    array_pop($list);
                                @endphp
                                @foreach($list as $image)
                                    <div class="swiper-slide "><img width="80%" src="{{$image}}" alt=""></div>
                                @endforeach


                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>

                    </div>
                </div>

                <div class="col-md-5 col-lg-6">
                    <div class="p-l-70 p-t-35 p-l-0-lg">
                        <h4 class="js-name1 txt-l-104 cl3 p-b-16">
                            {{$product->name}}
                        </h4>

                        <span class="txt-m-117 cl9">
							{{$product->price}}
                            <small>vnđ</small>
						</span>

                        <p class="txt-s-101 cl6 mt-2">
                            {{$product->description}}
                        </p>

                        <div class="flex-w flex-m p-t-55 p-b-30">
                            <div class="wrap-num-product flex-w flex-m bg12 p-rl-10 m-r-30 m-b-30">
                                <div class="btn-num-product-down flex-c-m fs-29"></div>

                                <input class="txt-m-102 cl6 txt-center num-product" type="number" name="num-product"
                                       value="1">

                                <div class="btn-num-product-up flex-c-m fs-16"></div>
                            </div>

                            <button class="flex-c-m txt-s-103 cl0 bg10 size-a-2 hov-btn2 trans-04 m-b-30 js-addcart1">
                                Add to cart
                            </button>
                        </div>

                        <div class="txt-s-107 p-b-6">
							<span class="cl6">
								Category:
							</span>

                            <span class="cl9">
								{{$product->category->name}}
							</span>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Tab01 -->
            <div class="tab02 p-t-80">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Detail</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (01)</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="p-t-30">
                            {!! $product->detail !!}
                        </div>
                    </div>


                    <!-- - -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="p-t-36">
                            <h5 class="txt-m-102 cl3 p-b-36">
                                1 review for Cauliflower
                            </h5>

                            <div class="flex-w flex-sb-t bo-b-1 bocl15 p-b-37">
                                <div class="wrap-pic-w size-w-56">
                                    <img src="images/avatar-03.jpg" alt="AVATAR">
                                </div>

                                <div class="size-w-57 p-t-2">
                                    <div class="flex-w flex-sb-m p-b-8">
                                        <div class="flex-w flex-b m-r-20 p-tb-5">
											<span class="txt-m-103 cl6 m-r-20">
												Crystal Jimenez
											</span>

                                            <span class="txt-s-120 cl9">
												( United States – June 21, 2017 )
											</span>
                                        </div>

                                        <span class="fs-16 cl11 lh-15 txt-center m-r-15 p-tb-5">
											<i class="fa fa-star m-rl-1"></i>
											<i class="fa fa-star m-rl-1"></i>
											<i class="fa fa-star m-rl-1"></i>
											<i class="fa fa-star m-rl-1"></i>
											<i class="fa fa-star m-rl-1"></i>
										</span>
                                    </div>

                                    <p class="txt-s-101 cl6">
                                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                                        in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                        old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                                        Virginia, looked up one of the more obscure Latin words, consectetur.
                                    </p>
                                </div>
                            </div>

                            <!-- Add review -->
                            <form class="w-full p-t-42">
                                <h5 class="txt-m-102 cl3 p-b-20">
                                    Add a review
                                </h5>

                                <p class="txt-s-101 cl6 p-b-10">
                                    Your email address will not be published. Required fields are marked *
                                </p>

                                <div class="flex-w flex-m p-b-3">
									<span class="txt-s-101 cl6 p-b-5 m-r-10">
										Your Rating
									</span>

                                    <span class="wrap-rating fs-16 cl11 pointer">
										<i class="item-rating pointer fa fa-star-o m-rl-1"></i>
										<i class="item-rating pointer fa fa-star-o m-rl-1"></i>
										<i class="item-rating pointer fa fa-star-o m-rl-1"></i>
										<i class="item-rating pointer fa fa-star-o m-rl-1"></i>
										<i class="item-rating pointer fa fa-star-o m-rl-1"></i>
										<input class="dis-none" type="number" name="rating">
									</span>
                                </div>

                                <span class="txt-s-101 cl6">
									Your review *
								</span>

                                <div class="row p-t-12">
                                    <div class="col-sm-6 p-b-30">
                                        <input class="txt-s-101 cl3 plh1 size-a-25 bo-all-1 bocl11 focus1 p-rl-20"
                                               type="text" name="name" placeholder="Name *">
                                    </div>

                                    <div class="col-sm-6 p-b-30">
                                        <input class="txt-s-101 cl3 plh1 size-a-25 bo-all-1 bocl11 focus1 p-rl-20"
                                               type="text" name="email" placeholder="Email *">
                                    </div>

                                    <div class="col-12 p-b-30">
                                        <textarea
                                            class="txt-s-101 cl3 plh1 size-a-26 bo-all-1 bocl11 focus1 p-rl-20 p-tb-10"
                                            name="review" placeholder="Your review *"></textarea>
                                    </div>
                                </div>

                                <div class="flex-r">
                                    <button class="flex-c-m txt-s-103 cl0 bg10 size-a-27 hov-btn2 trans-04">
                                        Submit
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related product -->
    <section class="sec-related bg0 p-b-85">
        <div class="container">
            <!-- slide9 -->
            <div class="wrap-slick9">
                <div class="flex-w flex-sb-m p-b-33 p-rl-15">
                    <h3 class="txt-l-112 cl3 m-r-20 respon1 p-tb-15">
                        RELATED PRODUCTS
                    </h3>

                    <div class="wrap-arrow-slick9 flex-w m-t-6"></div>
                </div>

                <div class="slick9">
                    <!-- - -->
                    <div class="item-slick9 p-all-15">
                        <!-- Block1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <img src="images/product-02.jpg" alt="IMG">

                                <div class="block1-content flex-col-c-m p-b-46">
                                    <a href="product-single.html"
                                       class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                        Strawberry
                                    </a>

                                    <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
										23$
									</span>

                                    <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                        <a href="product-single.html" class="block1-icon flex-c-m wrap-pic-max-w">
                                            <img src="/user/images/icons/icon-view.png" alt="ICON">
                                        </a>

                                        <a href="#" class="block1-icon flex-c-m wrap-pic-max-w js-addcart-b1">
                                            <img src="/user/images/icons/icon-cart.png" alt="ICON">
                                        </a>

                                        <a href="wishlist.html"
                                           class="block1-icon flex-c-m wrap-pic-max-w js-addwish-b1">
                                            <img class="icon-addwish-b1" src="/user/images/icons/icon-heart.png" alt="ICON">
                                            <img class="icon-addedwish-b1" src="/user/images/icons/icon-heart2.png"
                                                 alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="item-slick9 p-all-15">
                        <!-- Block1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <img src="images/product-03.jpg" alt="IMG">

                                <div class="block1-content flex-col-c-m p-b-46">
                                    <a href="product-single.html"
                                       class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                        Cauliflower
                                    </a>

                                    <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
										19$
									</span>

                                    <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                        <a href="product-single.html" class="block1-icon flex-c-m wrap-pic-max-w">
                                            <img src="/user/images/icons/icon-view.png" alt="ICON">
                                        </a>

                                        <a href="#" class="block1-icon flex-c-m wrap-pic-max-w js-addcart-b1">
                                            <img src="/user/images/icons/icon-cart.png" alt="ICON">
                                        </a>

                                        <a href="wishlist.html"
                                           class="block1-icon flex-c-m wrap-pic-max-w js-addwish-b1">
                                            <img class="icon-addwish-b1" src="/user/images/icons/icon-heart.png" alt="ICON">
                                            <img class="icon-addedwish-b1" src="/user/images/icons/icon-heart2.png"
                                                 alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="item-slick9 p-all-15">
                        <!-- Block1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <img src="images/product-04.jpg" alt="IMG">

                                <div class="block1-content flex-col-c-m p-b-46">
                                    <a href="product-single.html"
                                       class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                        Vegetable
                                    </a>

                                    <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
										22$
									</span>

                                    <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                        <a href="product-single.html" class="block1-icon flex-c-m wrap-pic-max-w">
                                            <img src="/user/images/icons/icon-view.png" alt="ICON">
                                        </a>

                                        <a href="#" class="block1-icon flex-c-m wrap-pic-max-w js-addcart-b1">
                                            <img src="/user/images/icons/icon-cart.png" alt="ICON">
                                        </a>

                                        <a href="wishlist.html"
                                           class="block1-icon flex-c-m wrap-pic-max-w js-addwish-b1">
                                            <img class="icon-addwish-b1" src="/user/images/icons/icon-heart.png" alt="ICON">
                                            <img class="icon-addedwish-b1" src="/user/images/icons/icon-heart2.png"
                                                 alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="item-slick9 p-all-15">
                        <!-- Block1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <img src="images/product-05.jpg" alt="IMG">

                                <div class="block1-content flex-col-c-m p-b-46">
                                    <a href="product-single.html"
                                       class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                        Bell pepper
                                    </a>

                                    <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
										12$
									</span>

                                    <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                        <a href="product-single.html" class="block1-icon flex-c-m wrap-pic-max-w">
                                            <img src="/user/images/icons/icon-view.png" alt="ICON">
                                        </a>

                                        <a href="#" class="block1-icon flex-c-m wrap-pic-max-w js-addcart-b1">
                                            <img src="/user/images/icons/icon-cart.png" alt="ICON">
                                        </a>

                                        <a href="wishlist.html"
                                           class="block1-icon flex-c-m wrap-pic-max-w js-addwish-b1">
                                            <img class="icon-addwish-b1" src="/user/images/icons/icon-heart.png" alt="ICON">
                                            <img class="icon-addedwish-b1" src="/user/images/icons/icon-heart2.png"
                                                 alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="item-slick9 p-all-15">
                        <!-- Block1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <img src="images/product-06.jpg" alt="IMG">

                                <div class="block1-content flex-col-c-m p-b-46">
                                    <a href="product-single.html"
                                       class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                        Beetroot
                                    </a>

                                    <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
										9$
									</span>

                                    <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                        <a href="product-single.html" class="block1-icon flex-c-m wrap-pic-max-w">
                                            <img src="/user/images/icons/icon-view.png" alt="ICON">
                                        </a>

                                        <a href="#" class="block1-icon flex-c-m wrap-pic-max-w js-addcart-b1">
                                            <img src="/user/images/icons/icon-cart.png" alt="ICON">
                                        </a>

                                        <a href="wishlist.html"
                                           class="block1-icon flex-c-m wrap-pic-max-w js-addwish-b1">
                                            <img class="icon-addwish-b1" src="/user/images/icons/icon-heart.png" alt="ICON">
                                            <img class="icon-addedwish-b1" src="/user/images/icons/icon-heart2.png"
                                                 alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="item-slick9 p-all-15">
                        <!-- Block1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <img src="images/product-07.jpg" alt="IMG">

                                <div class="block1-content flex-col-c-m p-b-46">
                                    <a href="product-single.html"
                                       class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                        Cabbage
                                    </a>

                                    <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
										15$
									</span>

                                    <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                        <a href="product-single.html" class="block1-icon flex-c-m wrap-pic-max-w">
                                            <img src="/user/images/icons/icon-view.png" alt="ICON">
                                        </a>

                                        <a href="#" class="block1-icon flex-c-m wrap-pic-max-w js-addcart-b1">
                                            <img src="/user/images/icons/icon-cart.png" alt="ICON">
                                        </a>

                                        <a href="wishlist.html"
                                           class="block1-icon flex-c-m wrap-pic-max-w js-addwish-b1">
                                            <img class="icon-addwish-b1" src="/user/images/icons/icon-heart.png" alt="ICON">
                                            <img class="icon-addedwish-b1" src="/user/images/icons/icon-heart2.png"
                                                 alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="item-slick9 p-all-15">
                        <!-- Block1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <img src="images/product-08.jpg" alt="IMG">

                                <div class="block1-content flex-col-c-m p-b-46">
                                    <a href="product-single.html"
                                       class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                        Tomato
                                    </a>

                                    <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
										38$
									</span>

                                    <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                        <a href="product-single.html" class="block1-icon flex-c-m wrap-pic-max-w">
                                            <img src="/user/images/icons/icon-view.png" alt="ICON">
                                        </a>

                                        <a href="#" class="block1-icon flex-c-m wrap-pic-max-w js-addcart-b1">
                                            <img src="/user/images/icons/icon-cart.png" alt="ICON">
                                        </a>

                                        <a href="wishlist.html"
                                           class="block1-icon flex-c-m wrap-pic-max-w js-addwish-b1">
                                            <img class="icon-addwish-b1" src="/user/images/icons/icon-heart.png" alt="ICON">
                                            <img class="icon-addedwish-b1" src="/user/images/icons/icon-heart2.png"
                                                 alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="item-slick9 p-all-15">
                        <!-- Block1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <img src="images/product-01.jpg" alt="IMG">

                                <div class="block1-content flex-col-c-m p-b-46">
                                    <a href="product-single.html"
                                       class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                        Red pumpkin
                                    </a>

                                    <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
										21$
									</span>

                                    <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                        <a href="product-single.html" class="block1-icon flex-c-m wrap-pic-max-w">
                                            <img src="/user/images/icons/icon-view.png" alt="ICON">
                                        </a>

                                        <a href="#" class="block1-icon flex-c-m wrap-pic-max-w js-addcart-b1">
                                            <img src="/user/images/icons/icon-cart.png" alt="ICON">
                                        </a>

                                        <a href="wishlist.html"
                                           class="block1-icon flex-c-m wrap-pic-max-w js-addwish-b1">
                                            <img class="icon-addwish-b1" src="/user/images/icons/icon-heart.png" alt="ICON">
                                            <img class="icon-addedwish-b1" src="/user/images/icons/icon-heart2.png"
                                                 alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="item-slick9 p-all-15">
                        <!-- Block1 -->
                        <div class="block1">
                            <div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
                                <img src="images/product-33.jpg" alt="IMG">

                                <div class="block1-content flex-col-c-m p-b-46">
                                    <a href="product-single.html"
                                       class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
                                        Cabbage
                                    </a>

                                    <span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04">
										8$
									</span>

                                    <div class="block1-wrap-icon flex-c-m flex-w trans-05">
                                        <a href="product-single.html" class="block1-icon flex-c-m wrap-pic-max-w">
                                            <img src="/user/images/icons/icon-view.png" alt="ICON">
                                        </a>

                                        <a href="#" class="block1-icon flex-c-m wrap-pic-max-w js-addcart-b1">
                                            <img src="/user/images/icons/icon-cart.png" alt="ICON">
                                        </a>

                                        <a href="wishlist.html"
                                           class="block1-icon flex-c-m wrap-pic-max-w js-addwish-b1">
                                            <img class="icon-addwish-b1" src="/user/images/icons/icon-heart.png" alt="ICON">
                                            <img class="icon-addedwish-b1" src="/user/images/icons/icon-heart2.png"
                                                 alt="ICON">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/c704dbde0e.js" crossorigin="anonymous"></script>
    <script src="/user/vendor/noui/nouislider.min.js"></script>
    <!--===============================================================================================-->
    <script src="/user/vendor/slide100/slide100.js"></script>
    <script src="/user/js/slide100-custom.js"></script>
    <!--===============================================================================================-->
    <script src="/user/js/main.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

@endsection