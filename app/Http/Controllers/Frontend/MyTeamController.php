<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Player;
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
        $teamId = auth('teamGuard')->user()->id;

        $alreadyExist = TeamPlayer::where('player_id', $id)->where('team_id', $teamId)->first();

        if ($alreadyExist) {
            // dd("already exist");
            notify()->error("player already exist in your team");
            return redirect()->back();
        }
        // dd("not exist");
        $playerCount = TeamPlayer::where('team_id', $teamId)->count();
        if ($playerCount >= 15) {
            notify()->error("Your team already has the maximum number of players");
            return redirect()->back();
        }

        TeamPlayer::create
        ([
            'team_id' => auth('teamGuard')->user()->id,
            'player_id' => $id,
            // 'status update
        ]);
        
        $playerStatus=Player::find($id);
        $playerStatus->update
        ([
            'status' => 'inactive'
        ]);

        notify()->success('Player is now in your Team');
        return redirect()->route('league.player.list');
    }
}
