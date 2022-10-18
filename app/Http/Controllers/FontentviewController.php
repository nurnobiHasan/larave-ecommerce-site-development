<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FontentviewController extends Controller
{
    public function fontentlayout(){
        return view("fontent.layout.fontentlayout");
    }

    public function fontentmainpage(){
      $this->data["bestseller"]=Product::all();
      $this->data["allproduct"]=Product::orderBy("id","desc")->get();
       return view("fontent.main.fontentmainpage",$this->data);
    }


}


