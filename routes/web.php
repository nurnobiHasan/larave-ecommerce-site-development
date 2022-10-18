<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\FontentviewController;
use App\Http\Controllers\FrontentSingleproductController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegistationController;
use App\Http\Controllers\ShopPageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLoginController;
use App\Models\Customer as ModelsCustomer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Console\StorageLinkCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    route::middleware("auth")->group(function(){
        route::get("layout",[LayoutController::class,"index"]);
        route::get("dashbord",[DashbordController::class,"index"]);
        route::resource("category",CategoryController::class);
        route::get("viewsubcategorise",[SubCategoryController::class,"viewsubcategory"]);
        route::get("addsubcategory",[SubCategoryController::class,"addsubcategory"]);
        route::post("addsubcategorystore",[SubCategoryController::class,"addsubcategorystore"]);
        route::get("editsubcategory/{id}",[SubCategoryController::class,"editsubcategory"]);
        route::patch("editsubcategorystore/{id}",[SubCategoryController::class,"editsubcategorystore"]);
        route::get("editcategory/{id}",[SubCategoryController::class,"editcategory"]);
        route::put("editstoredata/{id}",[SubCategoryController::class,"editstoredata"]);
        route::delete("deletesubcategory/{id}",[SubCategoryController::class,"deletesubcategory"]);

    });

    route::get("userlogin",[UserLoginController::class,"loignform"]);
    route::post("checklogin",[UserLoginController::class,"checklogin"]);
    route::get("logout",[UserLoginController::class,"logout"])->name("login");
    route::get("registation",[RegistationController::class,"index"]);
    route::post("checkregistation",[RegistationController::class,"storedata"]);



//product
route::resource("products",ProductController::class);
//fontent
route::get("/",[FontentviewController::class,"fontentmainpage"]);
route::get("fontenthome",[FontentviewController::class,"fontentmainpage"]);
route::get("fontentlayout",[FontentviewController::class,"fontentlayout"]);
route::get("productitem/{slug}",[FrontentSingleproductController::class,"singleproduct"]);
route::get("shoppage",[ShopPageController::class,"shoppage"]);
route::get("singlecart/{id}",[CartController::class,"index"]);
route::get("cartpage",[CartController::class,"cartpage"]);
route::get("cartpage/{coupon_id}",[CartController::class,"cartpage"]);
route::get("cartdelete/{id}",[CartController::class,"cartdelete"]);
route::post("cartupdate",[CartController::class,"cartupdate"]);
route::get("checkoutpage",[CheckoutController::class,"checkout"]);
route::get("api/get-state-list/{country_id}",[CheckoutController::class,"countrystatelist"])->name("countrystatelist");
route::get("api/get-city-list/{stated_id}",[CheckoutController::class,"countrycitylist"])->name("countrycitylist");
route::post("payment",[PaymentController::class,"payment"])->name("payment");


