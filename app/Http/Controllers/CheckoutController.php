<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\City;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\State;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function checkout(){
        $auth_user=Auth::user();
        $country=Country::orderBy("name","asc")->get();
        $userip=$_SERVER["REMOTE_ADDR"];
        $subtotal=0;
        $cartdata=Cart::where("user_ip",$userip)->get();

        foreach( $cartdata as $singlecartdata){
            $subtotal+=$singlecartdata->products->product_prize * $singlecartdata->product_quantity;

        }
        session(["subtotal"=>$subtotal]);
        return view("fontent.checkout.checkout",compact("auth_user","country","cartdata","subtotal"));
    }
    public function countrystatelist($country_id){
        $state=State::where("country_id",$country_id)->get();
        return response()->json($state);
    }
    public function countrycitylist($state_id){
        $city=City::where("state_id",$state_id)->get();
        return response()->json($city);
    }
}
