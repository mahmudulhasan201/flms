<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function login(){
        return view('backend.pages.login');
    }

    public function doLogin(Request $request){
        // dd($request->all());

        $userInput=$request->except('_token');

        $checkLogin=auth()->attempt($userInput);

        if($checkLogin){
            notify()->success('login successful');
            return redirect()->route('dashboard');
        }
        notify()->error('Invalid Credentials');
        return redirect()->back();
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
