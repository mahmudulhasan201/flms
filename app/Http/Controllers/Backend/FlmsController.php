<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlmsController extends Controller
{
    public function flmsStart(){
        // dd("hello");
        return view('backend.pages.flms.flmsinfo');  
    }
}
