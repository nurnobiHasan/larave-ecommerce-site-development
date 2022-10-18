<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistationController extends Controller
{
   public function index(){
        return  view("register.register.register");
   }
   public function storedata(Request $request){
       $request->validate(
            [
                "name"=>"required",
                "email"=>"required|email|unique:users",
                "password"=>"required",
                "confirmpassword"=>"required"
            ]
       );
       $storedata=new User();
       $storedata->name=$request->name;
       $storedata->email=$request->email;
       $storedata->password=Hash::make($request->password);
        $storedata->confirmpassword=Hash::make($request->confirmpassword);
       $storedata->save();
       return redirect()->to("/fontenthome");

   }
}
