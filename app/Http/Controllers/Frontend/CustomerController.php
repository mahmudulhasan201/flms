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
      // dd($request->all());
    Customer::create([
        'name'=>$request->customer_name,
        'email'=>$request->customer_email,
        'mobile'=>$request->customer_number,
        'password'=>bcrypt($request->customer_password),
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

      // dd($request->all());

      $loginInfo = ['email'=>$request->email_address,'password'=>$request->password];

      $checkLogin = auth()->guard('customerGuard')->attempt($loginInfo);

      //dd($checkLogin);

      if($checkLogin){
       

         notify()->success("Login Succcessful");
         return redirect()->route('homepage');
      }

      notify()->error("invalid email or password");
      return redirect()->back();
   }
   public function customerLogout(){
      auth()->guard('customerGuard')->logout();
      return redirect()->route('homepage');
   }
}
