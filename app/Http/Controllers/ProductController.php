<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=Product::all();
       $this->data["allproduct"]=Product::all();
       return view("backend.viewproduct.viewproduct",$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data["allcategory"]=Category::all();
        $this->data["allsubcategory"]=SubCategory::all();
        $this->data["product"]=Product::all();
        $this->data["singleproduct"]=new Product();
        return view("backend.product.addproduct.addproduct",$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "product_name"=>"required",
                "product_summery"=>"required",
                "product_slug"=>"unique:products",
                "product_prize"=>"required",
                "product_quantity"=>"required"
            ]
        );
        $addcategory=new Product();
        $addcategory->product_name=$request->product_name;
        $addcategory->category_id=$request->category_name;
        $addcategory->subcategory_id=$request->subcategory_name;
        $addcategory->slug=strtolower(str_replace(" ","-",$request->slug_name));
        $addcategory->product_summery=$request->product_summery;
        $addcategory->product_description=$request->product_description;
        $addcategory->product_prize=$request->product_prize;
        $addcategory->product_quantity=$request->product_quantity;
        $addcategory->product_thumbnail=$request->file("product_photo")->store("imgage","public");
        $addcategory->created_at=Carbon::now();
        $addcategory->updated_at=Carbon::now();
        $addcategory->save();
        return redirect()->to("products")->with("addproduct","Product Added Successfully");







    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $this->data["singleproduct"]=$product;
        if($product->product_thumbnail){
            $this->data["singleproduct"]->product_thumbnail=Storage::url($product->product_thumbnail);
        }
        return view("backend.product.singleviweproduct.singleviweproduct",$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->data["allcategory"]=Category::all();
        $this->data["allsubcategory"]=SubCategory::all();
        $this->data["product"]=Product::all();
        $this->data["singleproduct"]=$product;
        return view("backend.product.addproduct.addproduct",$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->product_name=$request->product_name;
        $product->category_id=$request->category_name;
        $product->subcategory_id=$request->subcategory_name;
        $product->product_summery=$request->product_summery;
        $product->product_description=$request->product_description;
        $product->product_prize=$request->product_prize;
        $product->product_quantity=$request->product_quantity;
         if(isset($request->product_photo)){
            if($request->product_photo){
                Storage::disk(("public"))->delete($request->product_photo);
            }
            $product->product_thumbnail=$request->file("product_photo")->store("imgage","public");
        }

        $product->save();
        return redirect()->to("/products")->with("productupate","product updated succesfully");



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->product_thumbnail){
           Storage::disk("public")->delete($product->product_thumbnail);
        }
        $product->delete();
        return redirect()->to("products")->with("deleteproduct","Product delete successfully");

    }
}
