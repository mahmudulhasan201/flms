<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TeamPlayer;
use Illuminate\Http\Request;

class TeamPlayerController extends Controller
{
    public function teamPlayerList(){
        $teamPlayer=TeamPlayer::all();
        return view('backend.pages.teamPlayer.teamPlayerList', compact('teamPlayer'));
    }

    public function teamPlayerForm(){
        return view('backend.pages.teamPlayer.teamPlayerForm');
    }

    public function viewTeamPlayerForm(Request $request){
            // dd($request->all()); 
         TeamPlayer::create([
             'teamId'=>$request->team_id,
             'playerId'=>$request->player_id,
         ]);

         notify()->success('Added Successfully.');
         return redirect()->back();
    }
}
