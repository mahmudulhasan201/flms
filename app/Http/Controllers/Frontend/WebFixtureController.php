<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebFixtureController extends Controller
{
    public function webFixture(){
        return view('frontend.pages.webFixture.fixture');
    }
}
