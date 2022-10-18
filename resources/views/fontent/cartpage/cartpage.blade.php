@extends("fontent.layout.fontentlayout")
@section("title")
    cart-page
@endsection
@section("content")
       <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shopping Cart</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{asset('cartupdate')}}" method="post">
                        @csrf
                        @if (SESSION("cartdelete"))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <p class="text-center text-capitalize"><strong>HI!</strong>{{SESSION("cartdelete")}}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (SESSION("cartupdated"))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <p class="text-center text-capitalize"><strong>HI!</strong>{{SESSION("cartupdated")}}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <table class="table-responsive cart-wrap col-md-12" style="width:100% !important">
                            <?php
                                $totalamount=0;
                            ?>
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cartdata as $singlecartdata )
                                    <input type="hidden" value="{{$singlecartdata->id}}" name="cart_id[]">
                                    <tr>
                                        <td class="images"><img src="{{Storage::url($singlecartdata->products->product_thumbnail)}}" alt=""></td>
                                        <td class="product"><a href="single-product.html">{{$singlecartdata->products->product_name}}</a></td>
                                        <td class="ptice">{{$singlecartdata->products->product_prize}}</td>
                                        <td class="quantity cart-plus-minus">
                                            <input type="text" name="product_quantity[]" value="{{$singlecartdata->product_quantity}}" />
                                        </td>
                                        <?php
                                           $totalamount+=$singlecartdata->products->product_prize * $singlecartdata->product_quantity;
                                        ?>
                                        <td class="total">{{$singlecartdata->products->product_prize * $singlecartdata->product_quantity}}</td>
                                        <td class="remove"><a onclick="return confirm('r u sure delete this data')" href="{{asset('cartdelete')}}/{{$singlecartdata->id}}"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10000">Yon Have't Cart Any Item</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button>Update Cart</button>
                                        </li>
                                        <li><a href="{{asset('shoppage')}}">Continue Shopping</a></li>
                                    </ul>
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    @if (session('couponexpaird'))
                                        <div class="alert alert-danger text-center text-capitalize">{{session('couponexpaird')}}</div>
                                    @endif
                                    @if (session('couponotmatch'))
                                        <div class="alert alert-danger text-center text-capitalize">{{session('couponotmatch')}}</div>
                                    @endif
                                    @if (session('couponsuccess'))
                                        <div class="alert alert-success text-center text-capitalize">{{session('couponsuccess')}}</div>
                                    @endif
                                    <div class="cupon-wrap">

                                        <input class="couponvalue" value="{{$ccoupon??''}}" type="text" placeholder="Cupon Code">
                                        <span class="couponbtn">Apply Cupon</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Total Amount=</span>${{$totalamount}}</li>
                                        <li><span class="pull-left">Discount(%)=</span>{{$discount}}</li>
                                        <li style="font-size:20px"><span style="font-size:20px" class="pull-left">Amount=</span>${{$totalamount-$discount}}</li>
                                    </ul>
                                    <a href="{{asset('checkoutpage')}}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{$totalamount}}

@endsection
@section("footer_js")
<script href="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script href="www.https://https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $("document")

        $('.couponbtn').click(function(){
            var couponvalues= $(".couponvalue").val();
            window.location.href="{{url('cartpage')}}/"+couponvalues;

        });

</script>
@endsection
