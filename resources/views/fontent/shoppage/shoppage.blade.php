@extends("fontent/layout/fontentlayout")
@section("title")
    All Product
@endsection
@section("content")
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shop Page</h2>
                        <ul>
                            <li><a href="{{asset('/')}}">Home</a></li>
                            <li><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- product-area start -->
    <div class="product-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="product-menu">
                        <ul class="nav justify-content-center">
                            <li>
                                <a class="active" data-toggle="tab" href="#all">All product</a>
                            </li>
                            @foreach ($allcategory as $singlecategory)
                                <li>
                                    <a data-toggle="tab" href="#chair{{$singlecategory->id}}">{{$singlecategory->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="all">
                    <ul class="row">
                        @foreach ($allproduct as $key=>$singleproduct)
                            <li class="col-xl-3 col-lg-4 col-sm-6 col-12 @if ($key>3)
                                moreload
                            @endif">
                                <div class="product-wrap">
                                    <div class="product-img">
                                        <span>Sale</span>
                                        <img style="height:220px" src="{{asset(Storage::url($singleproduct->product_thumbnail))}}" alt="">
                                        <div class="product-icon flex-style">
                                            <ul>
                                                <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="{{asset('singlecart')}}/{{$singleproduct->id}}"><i class="fa fa-shopping-bag"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{asset('productitem')}}/{{$singleproduct->slug}}">{{$singleproduct->product_name}}</a></h3>
                                        <p class="pull-left">
                                           $ {{$singleproduct->product_prize}}
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
                @foreach ($allcategory as $singlecategory)
                            <div class="tab-pane" id="chair{{$singlecategory->id}}">
                                <ul class="row">
                                @foreach (App\Models\Product::where("category_id" , $singlecategory->id)->limit(4)->inRandomOrder()->get() as $key=>$checkcat)
                                    <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                        <div class="product-wrap">
                                            <div class="product-img">
                                                <span>Sale</span>
                                                <img style="height:180px" src="{{Storage::url($checkcat->product_thumbnail)}}" alt="">
                                                <div class="product-icon flex-style">
                                                    <ul>
                                                        <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                                        <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                                        <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h3><a href="single-product.html">{{$checkcat->product_name}}</a></h3>
                                                <p class="pull-left">${{$checkcat->product_prize}}
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
                                </ul>
                            </div>

                 @endforeach
            </div>
        </div>
    </div>
    <!-- product-area end -->


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
    <!-- end social-newsletter-section -->
@endsection
