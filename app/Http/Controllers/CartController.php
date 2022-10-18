<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller{
    public function index($product_id){

        $ipaddress=$_SERVER["REMOTE_ADDR"];
        if(Cart::where("product_id",$product_id)->where("user_ip", $ipaddress)->exists()){
                Cart::where("product_id",$product_id)->where("user_ip", $ipaddress)->increment("product_quantity");
        }else{
                Cart::insert(
                    [
                        "product_id"=>$product_id,
                        "user_ip"=>$ipaddress,
                        "created_at"=>Carbon::now(),
                        "updated_at"=>Carbon::now()
                    ]
            );
        }

        return back();
        // return redirect()->to("cartpage");

    }
    public function cartpage($coupon_id=""){
        if($coupon_id ==""){
            $discount=0;
            $userip=$_SERVER["REMOTE_ADDR"];
            $cartdata=Cart::where("user_ip",$userip)->get();
            session(["coupondiscount"=>$discount]);
            return view("fontent.cartpage.cartpage",compact('cartdata','discount'));

        }else{
            if(Coupon::where("coupon_code",$coupon_id)->exists()){
                     $validate=Coupon::where("coupon_code",$coupon_id)->first()->coupon_validated_day;
                    if(Carbon::now()->format("Y-m-d")<=$validate){
                        $userip=$_SERVER["REMOTE_ADDR"];
                        $cartdata=Cart::where("user_ip",$userip)->get();
                        $discount=Coupon::where("coupon_code",$coupon_id)->first()->coupon_discount;
                        session(["coupondiscount"=>$discount]);
                        $ccoupon=Coupon::where("coupon_code",$coupon_id)->first()->coupon_code;
                        $danger=Carbon::now()->format("Y-m-d")<=$validate;
                        return view("fontent.cartpage.cartpage",compact('cartdata','discount','ccoupon'))->with("couponsuccess","coupon discount successfully.Enjoy !");

                    }else{
                     return back()->with("couponexpaird","sorry,coupon alrady expaired");

                    }

        }else{
            // return back()->with("couponotmatch","coupon not match our offer.plz try agin.");
            return back()->with("couponotmatch","coupon dont match.tray again");
        }

        }
    }

    public function cartdelete($id){
        $ipaddress=$_SERVER["REMOTE_ADDR"];
        Cart::where("user_ip",$ipaddress)->where("id",$id)->delete();
        return back()->with("cartdelete","cart deleted successfully");
    }
    public function cartupdate(REQUEST $request){
        foreach($request->cart_id as $key=>$singlecart){
            $data=Cart::findOrFail($singlecart);
            $data->product_quantity=$request->product_quantity[$key];
            $data->updated_at=Carbon::now();
            $data->save();
        }
        return back()->with("cartupdated","cart updated successfully");

    }
}
