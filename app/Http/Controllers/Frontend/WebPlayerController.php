<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebPlayerController extends Controller
{
    public function playerRegistrationForm(){
        return view('frontend.pages.webPlayer.playerRegistrationForm');
    }


    public function playerLoginForm(){
        return view('frontend.pages.webPlayer.playerLoginForm');
    }


    public function doPlayerRegistration(){
    
    }
}
