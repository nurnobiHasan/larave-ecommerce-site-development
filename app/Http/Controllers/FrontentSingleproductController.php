<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontentSingleproductController extends Controller
{
    public function singleproduct($slug){
        // $this->data["alldata"]=Product::where("categ"=",$slug)->get();
        $singleproduct=Product::where("slug",$slug)->first();
        $alldata=Product::where("category_id",$singleproduct->category_id)->limit(4)->inRandomOrder()->get();
        return view("fontent.product.singleproduct.singleproduct",compact("singleproduct"),compact("alldata"));
    }
}
