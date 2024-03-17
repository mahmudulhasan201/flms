<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Submit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function user()
    {
        return view('backend.pages.dashboard');
    }  
    public function admin()
    {
        return view('admin_panal');
    }
    public function hhh()
    {
        return view('welcome');
    }

    public function form()
    {
        return view('backend.pages.mahmud.form');
    }

    
    public function submitform(Request $request)
    {
       Product::create([
             //banm pase column name => dan pase value
             'name'=>$request->name,
             'price'=>$request->price,
             'quantity'=>$request->quantity
        ]);

       return redirect()->back();

    }
}