<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function loignform(){
        return view("register.register.login.login");
    }
    public function checklogin(Request $request){
       $chekdata=$request->only(["email","password"]);
       if(Auth::attempt($chekdata)){
        return redirect()->intended("/dashbord");
       }else{
            return redirect()->to("/registation");
       }
    }
    public function logout(){
        Auth::logout();
        return redirect()->to('registation');
    }
}
