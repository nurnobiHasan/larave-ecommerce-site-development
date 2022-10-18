@extends("fontent.layout.fontentlayout")
@section("content")
        <!-- slider-area start -->
        <div class="slider-area">
            <div class="swiper-container">
                <div class="swiper-wrapper">
        <div class="swiper-slide overlay">
            <div class="single-slider slide-inner slide-inner1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-lg-9 col-12">
                            <div class="slider-content">
                                <div class="slider-shape">
                                    <h2 data-swiper-parallax="-500">Amazing Pure Nature Hohey</h2>
                                    <p data-swiper-parallax="-400">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                    <a href="shop.html" data-swiper-parallax="-300">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <div class="swiper-slide">
                        <div class="slide-inner slide-inner7">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-lg-9 col-12">
                                        <div class="slider-content">
                                            <div class="slider-shape">
                                                <h2 data-swiper-parallax="-500">Amazing Pure Nature Coconut Oil</h2>
                                                <p data-swiper-parallax="-400">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                                <a href="shop.html" data-swiper-parallax="-300">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide-inner slide-inner8">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-lg-9 col-12">
                                        <div class="slider-content">
                                            <div class="slider-shape">
                                                <h2 data-swiper-parallax="-500">Amazing Pure Nut Oil</h2>
                                                <p data-swiper-parallax="-400">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                                <a href="shop.html" data-swiper-parallax="-300">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <!-- slider-area end -->
        <!-- featured-area start -->
        <div class="featured-area featured-area2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="featured-active2 owl-carousel next-prev-style">
                            <div class="featured-wrap">
                                <div class="featured-img">
                                    <img src="assets/images/featured/6.jpg" alt="">
                                    <div class="featured-content">
                                        <a href="shop.html">Pure Honey</a>
                                    </div>
                                </div>
                            </div>
                            <div class="featured-wrap">
                                <div class="featured-img">
                                    <img src="assets/images/featured/7.jpg" alt="">
                                    <div class="featured-content">
                                        <a href="shop.html">Mustard Oil</a>
                                    </div>
                                </div>
                            </div>
                            <div class="featured-wrap">
                                <div class="featured-img">
                                    <img src="assets/images/featured/8.jpg" alt="">
                                    <div class="featured-content">
                                        <a href="shop.html">Olive Oil</a>
                                    </div>
                                </div>
                            </div>
                            <div class="featured-wrap">
                                <div class="featured-img">
                                    <img src="assets/images/featured/6.jpg" alt="">
                                    <div class="featured-content">
                                        <a href="shop.html">Pure Honey</a>
                                    </div>
                                </div>
                            </div>
                            <div class="featured-wrap">
                                <div class="featured-img">
                                    <img src="assets/images/featured/8.jpg" alt="">
                                    <div class="featured-content">
                                        <a href="shop.html">Olive Oil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- featured-area end -->
        <!-- start count-down-section -->
        <div class="count-down-area count-down-area-sub">
            <section class="count-down-section section-padding parallax" data-speed="7">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 text-center">
                            <h2 class="big">Deal Of the Day <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</span></h2>
                        </div>
                        <div class="col-12 col-lg-12 text-center">
                            <div class="count-down-clock text-center">
                                <div id="clock">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </section>
        </div>
        <!-- end count-down-section -->
        <!-- product-area start -->
        <div class="product-area product-area-2">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Best Seller</h2>
                            <img src="assets/images/section-title.png" alt="">
                        </div>
                    </div>
                </div>
                <ul class="row">
                    @foreach ($bestseller as $key1=>$singlebestseller)
                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12 @if ($key1>=0)
                            moreload
                        @endif">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <img style="height:300px;" src="{{Storage::url($singlebestseller->product_thumbnail)}}" alt="pik nai">

                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="{{url('singlecart')}}/{{$singlebestseller->id}}"><i class="fa fa-shopping-bag"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="single-product.html">{{$singlebestseller->product_name}}</a></h3>
                                    <p class="pull-left">${{$singlebestseller->product_prize}}

                                    </p>
                                    <ul class="pull-right d-flex">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach

                    <li class="col-12 text-center">
                        <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- product-area end -->
        <!-- product-area start -->
        <div class="product-area">
            <div class="fluid-container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Our Latest Product</h2>
                            <img src="assets/images/section-title.png" alt="">
                        </div>
                    </div>
                </div>
                <ul class="row">
                    @foreach ($allproduct as $key=> $singleproduct )
                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12 @if ($key>3)
                            moreload
                        @endif">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <span>Sale</span>
                                    <div style="height:300px" class="img">
                                        <img style="width:100%;height:100%" src="{{Storage::url($singleproduct->product_thumbnail)}}" alt="{{$singleproduct->product_name}}">
                                    </div>
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter{{$singleproduct->id}}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="{{asset('singlecart')}}/{{$singleproduct->id}}"><i class="fa fa-shopping-bag"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{asset('/productitem')}}/{{$singleproduct->slug}}">{{$singleproduct->product_name}}</a></h3>
                                    <p class="pull-left">${{$singleproduct->product_prize}}

                                    </p>
                                    <ul class="pull-right d-flex">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <div class="modal fade" id="exampleModalCenter{{$singleproduct->id}}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="modal-body d-flex">
                                        <div class="product-single-img w-50">
                                            <img src="{{Storage::url($singleproduct->product_thumbnail)}}" alt="{{$singleproduct->product_name}}">
                                        </div>
                                        <div class="product-single-content w-50">
                                            <h3>{{$singleproduct->product_name}}</h3>
                                            <div class="rating-wrap fix">
                                                <span class="pull-left">${{$singleproduct->product_prize}}</span>
                                                <ul class="rating pull-right">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li>(05 Customar Review)</li>
                                                </ul>
                                            </div>
                                            <p>{{$singleproduct->product_summery}}</p>
                                            <ul class="input-style">
                                                <li class="quantity cart-plus-minus">
                                                    <input type="text" value="1" />
                                                </li>
                                                <li><a href="{{asset('single-card')}}/{{$singleproduct->id}}" target="_blank">Add To Cart</a></li>
                                            </ul>
                                            <ul class="cetagory">
                                                <li>Category:</li>
                                                <li>{{$singleproduct->category->name ?? "N/A"}}</li>

                                            </ul>
                                            <ul class="socil-icon">
                                                <li>Share :</li>
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <li class="col-12 text-center">
                        <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- product-area end -->
        <!-- testmonial-area start -->
        <div class="testmonial-area testmonial-area2 bg-img-2 black-opacity">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="test-title text-center">
                            <h2>What Our client Says</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1 col-12">
                        <div class="testmonial-active owl-carousel">
                            <div class="test-items test-items2">
                                <div class="test-content">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                    <h2>Elizabeth Ayna</h2>
                                    <p>CEO of Woman Fedaration</p>
                                </div>
                                <div class="test-img2">
                                    <img src="assets/images/test/1.png" alt="">
                                </div>
                            </div>
                            <div class="test-items test-items2">
                                <div class="test-content">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                    <h2>Elizabeth Ayna</h2>
                                    <p>CEO of Woman Fedaration</p>
                                </div>
                                <div class="test-img2">
                                    <img src="assets/images/test/1.png" alt="">
                                </div>
                            </div>
                            <div class="test-items test-items2">
                                <div class="test-content">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical LatinContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
                                    <h2>Elizabeth Ayna</h2>
                                    <p>CEO of Woman Fedaration</p>
                                </div>
                                <div class="test-img2">
                                    <img src="assets/images/test/1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testmonial-area end -->
        <!-- start social-newsletter-section -->
        <section class="social-newsletter-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="newsletter text-center">
                            <h3>Subscribe  Newsletter</h3>
                            <div class="newsletter-form">
                                <form>
                                    <input type="text" class="form-control" placeholder="Enter Your Email Address...">
                                    <button type="submit"><i class="fa fa-send"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </section>
    @endsection
