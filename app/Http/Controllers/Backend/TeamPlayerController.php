<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use App\Models\TeamPlayer;
use Illuminate\Http\Request;

class TeamPlayerController extends Controller
{
    public function teamPlayerList(){
        $teamPlayer=TeamPlayer::with('team','player')->paginate(8);
        return view('backend.pages.teamPlayer.teamPlayerList', compact('teamPlayer'));
    }

    public function teamPlayerForm(){
        $takeTeamId=Team::all();
        $takePlayerId=Player::all();
        return view('backend.pages.teamPlayer.teamPlayerForm',compact('takeTeamId','takePlayerId'));
    }

    public function viewTeamPlayerForm(Request $request){
            // dd($request->all()); 
         TeamPlayer::create([
             'team_Id'=>$request->team_id,
             'player_Id'=>$request->player_id, 
         ]);

         notify()->success('Added Successfully.');
         return redirect()->back();
    }

    //Edit View Delete
    public function teamPlayerDelete($tp_id){
        $deletePlayer=TeamPlayer::find($tp_id);
        $deletePlayer->delete();

        notify()->success('Team Player Deleted successfully'); 
        return redirect()->back();
    }
}
