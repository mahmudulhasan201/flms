<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function viewLeague()
    {
        return  view('backend.pages.league');
    }
}
