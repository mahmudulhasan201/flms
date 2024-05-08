<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function PHPUnit\Framework\matches;

class WebpageController extends Controller
{
    public function homepage(){
        return view('frontend.pages.home');
    }

    public function match(){
        return view('frontend.pages.matches');
    }
}
