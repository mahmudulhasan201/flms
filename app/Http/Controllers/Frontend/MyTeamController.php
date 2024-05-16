<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TeamPlayer;

class MyTeamController extends Controller
{
    public function viewTeam()
    {
        return view();
    }

    public function addPlayerToTeam($id)
    {
        // dd($id);
        $alreadyExist = TeamPlayer::where('player_id', $id)->first();
        if ($alreadyExist) {
            // dd("already exist");
            notify()->error("player already exist in your team");
            return redirect()->back();
        }
        // dd("not exist");

        TeamPlayer::create([
            'team_id' => auth('teamGuard')->user()->id,
            'player_id' => $id,

        ]);

        notify()->success('Player is now in your Team');

        return redirect()->route('league.player.list');
    }
}
