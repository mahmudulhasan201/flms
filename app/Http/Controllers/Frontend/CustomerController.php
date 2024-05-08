<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
   public function registrationForm(){
    return view('frontend.pages.customer.registrationForm');
   }

   public function doRegistration(Request $request){
    Customer::create([
        'name'=>$request->customer_name,
        'email'=>$request->customer_email,
        'mobile'=>$request->customer_number,
        'password'=>$request->customer_password,
        'status'=>$request->customer_status,
    ]);
    notify()->success("Registration Successful");
    return redirect()->route('homepage'); 
   }

//Frontend Login

   public function loginForm(){
    return view('frontend.pages.customer.loginForm');
   }

   public function doLogin(Request $request){

      $loginInfo = ['email'=>$request->customer_email,'password'=>$request->customer_password];

   }
}
