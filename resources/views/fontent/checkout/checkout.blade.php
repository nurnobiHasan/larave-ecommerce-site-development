@extends("fontent.layout.fontentlayout");
@section("content")
    <!-- breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Checkout</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- checkout-area start -->
    <style>
        form input{
            border-radius:0px !important;
        }
        form select{
            border-radius:0px !important;
        }
        form textarea{
            border-radius:0px !important;
        }
    </style>
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form form-style">
                        <h3>Billing Details</h3>
                    <form action="{{url('payment')}}" method="post">
                            @csrf
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <p>First Name *</p>
                                <input name="first_name" style="width:100%" type="text" placeholder="write your first name....">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Last Name *</p>
                                <input name="last_name" style="width:100%" type="text" placeholder="write your last name....">
                            </div>
                            <div class="col-12">
                                <p>Compani Name</p>
                                <input name="company_name" style="width:100%" type="text" placeholder="write your company name....">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Phone No *</p>
                                <input name="phone" style="width:100%" type="text" placeholder="write ph number">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Email Address *</p>
                                <input name="email" style="width:100%" type="email" placeholer="write email address...">
                            </div>
                            <div class="col-12">
                                <p>Country *</p>
                                <select style="width:100%" name="country_id" id="country_id">
                                    <option value="country">Select Country:</option>
                                    @foreach ($country as $singlecountry)
                                        <option value="{{$singlecountry->id}}">{{$singlecountry->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Your Address *</p>
                                <input name="address" style="width:100%" type="text" placeholder="write your address...">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Stated Address *</p>
                                <select style="width:100%" name="stated_id" id="stated_id">
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Postcode/ZIP</p>
                                <input name="zipcode" style="width:100%" type="text" placeholder="write zipe code....">
                                </div>
                            <div class="col-sm-6 col-12">
                                <p>Town/City *</p>
                                <select style="width:100%" name="city_id" id="city_id">
                                </select>
                            </div>
                            <div class="col-12">
                                <p>Order Notes </p>
                                <textarea style="width:100%" name="notes" placeholder="write your notes here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-4">
                        <div class="order-area">
                            <h3>Your Order</h3>
                            <ul class="total-cost">
                                @foreach ($cartdata as $singlecartdata)
                                    <li>{{$singlecartdata->products->product_name}}({{$singlecartdata->product_quantity}})<span class="pull-right">{{$singlecartdata->products->product_prize*$singlecartdata->products->product_quantity}}</span></li>
                                @endforeach
                                <li>Subtotal <span class="pull-right"><strong>{{$subtotal}}</strong></span></li>
                                <li>Shipping <span class="pull-right">Free</span></li>
                                <li>Total<span class="pull-right"><strong>{{$subtotal}}</strong></span></li>
                            </ul>
                            <ul class="payment-method">
                                <li>
                                    <input id="bank" type="radio" name="payment" value="stripe">
                                    <label for="bank">Stripe</label>
                                </li>
                                <li>
                                    <input id="paypal" type="radio" name="payment" value="paypal">
                                    <label for="paypal">Paypal</label>
                                </li>
                                <li>
                                    <input id="card" type="radio" name="payment" value="credit_card">
                                    <label for="card">Credit Card</label>
                                </li>
                                <li>
                                    <input id="delivery" type="radio" name="payment" value="case_on_delevary">
                                    <label for="delivery">Cash on Delivery</label>
                                </li>
                            </ul>
                                <button>Place Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
    @section("footer_js")
       <script>

             $('#country_id').change(function(){
            var countryID = $(this).val();
            if(countryID){
                $.ajax({
                    type:"GET",
                    url:"{{url('api/get-state-list')}}/"+countryID,
                    success:function(res){
                    if(res){
                        $("#stated_id").empty();
                        $("#stated_id").append('<option>Select</option>');
                        $.each(res,function(key,value){
                            $("#stated_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });

                    }else{
                        $("#stated_id").empty();
                    }
                    }
                });
            }else{
                $("#stated_id").empty();
                $("#city_id").empty();
            }
            });
            $('#stated_id').on('change',function(){
            var stateID = $(this).val();
            if(stateID){
                $.ajax({
                    type:"GET",
                    url:"{{url('api/get-city-list')}}/"+stateID,
                    success:function(res){
                    if(res){
                        $("#city_id").empty();
                        $.each(res,function(key,value){
                            $("#city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });

                    }else{
                        $("#city_id").empty();
                    }
                    }
                });
            }else{
                $("#city_id").empty();
            }

            });

       </script>
       @endsection

@endsection
