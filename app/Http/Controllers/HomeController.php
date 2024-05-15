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
 
}