<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopPageController extends Controller
{
    public function shoppage(){
        $allcategory=Category::orderBy("name","asc")->get();
        $allproduct=Product::orderBy("id","desc")->get();
        return view("fontent.shoppage.shoppage",compact("allcategory"),compact("allproduct"));
    }
}
