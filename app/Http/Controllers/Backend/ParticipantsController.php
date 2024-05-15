<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
   public function participants(){
    return view('backend.pages.participants.participants');
   }
}
