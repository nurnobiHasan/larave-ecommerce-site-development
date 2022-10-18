<?php

namespace App\Http\Controllers;

use App\Models\Billings;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Shippings;
use Carbon\Carbon;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function payment(REQUEST $request){
        $total=$request->session()->get("subtotal");
        $discouont=$request->session()->get("coupondiscount");
        $shipping_id=Shippings::insertGetId([
            "user_id"=>Auth::user()->id,
            "first_name"=>$request->first_name,
            "last_name"=>$request->last_name,
            "company_name"=>$request->company_name,
            "phone"=>$request->phone,
            "email"=>$request->email,
            "country_id"=>$request->country_id,
            "address"=>$request->address,
            "stated_id"=>$request->stated_id,
            "zipcode"=>$request->zipcode,
            "city_id"=>$request->city_id,
            "notes"=>$request->notes,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);


        $sale_id=Sale::insertGetId([
            "user_id"=>Auth::user()->id,
            "shipping_id"=>$shipping_id,
            "grand_total"=>$total,
            "discount"=>$discouont,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),


        ]);
        $userip=$_SERVER["REMOTE_ADDR"];
        $cartdata=Cart::where("user_ip",$userip)->get();
        foreach($cartdata as $singlecartitem){
            Billings::insert([
                "user_id"=>Auth::user()->id,
                "sale_id"=>$sale_id,
                "product_id"=>$singlecartitem->product_id,
                "product_prize"=>$singlecartitem->products->product_prize,
                "product_quantity"=>$singlecartitem->products->product_quantity,
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now(),
            ]);
               product::findOrFail($singlecartitem->product_id)->decrement("product_quantity",$singlecartitem->product_quantity);
               $singlecartitem->delete();
               return "successfully";


        }


        return"welcome";
    }

}
