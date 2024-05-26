<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Player;
use App\Models\Product;
use App\Models\Submit;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function user()
    {
        $players = Player::count();
        $leagues = League::count();
        $teams = Team::count();
        return view('backend.pages.dashboard', compact('players', 'leagues', 'teams'));
    }
}
