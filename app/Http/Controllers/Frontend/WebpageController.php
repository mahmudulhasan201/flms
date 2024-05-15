<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Player;
use Illuminate\Http\Request;

use function PHPUnit\Framework\matches;

class WebpageController extends Controller
{
    public function homepage()
    {
        return view('frontend.pages.home');
    }

    public function match()
    {
        // $data = League::with('season')->where('status', 'Active')->where('season_id', '1')->get();
        $data = League::with('season')->where('status', 'Active')->get();

        return view('frontend.pages.matches', compact('data'));
    }

    public function joinLeague()
    {
        return view('frontend.pages.joinLeague');
    }

    public function playerList()
    {
        $data = Player::paginate(10);
        return view('frontend.pages.leaguePlayerList', compact('data'));
    }
}
