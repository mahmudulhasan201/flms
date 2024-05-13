<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use App\Models\TeamPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $checkValidation = Validator::make($request->all(),[
                'team_id'=>'required',
                'player_id'=>'required'
        ]); 

        if($checkValidation->fails()){
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }
         TeamPlayer::create([
             'team_Id'=>$request->team_id,
             'player_Id'=>$request->player_id, 
         ]);

         notify()->success('Added Successfully.');
         return redirect()->back();
    }

    //Edit
    public function teamPlayerEdit($edit_id){
        $player=Player::all();
        $team=Team::all();
        $editTeamPlayer= TeamPlayer::find($edit_id); 
        return view('backend.pages.teamPlayer.teamPlayerEdit',compact('editTeamPlayer','player','team'));
    }

    public function teamPlayerUpdate(Request $request,$update_id){ 
        $updateTeamPlayer= TeamPlayer::find($update_id);

       $updateTeamPlayer->update([
            'team_Id'=>$request->team_id,
            'player_Id'=>$request->player_id, 
        ]);

        notify()->success('Update Successful.'); 
        return redirect()->route('teamPlayer.list'); 

    }


    //View
    public function teamPlayerView($view_id){
        $viewTeamPlayer= TeamPlayer::find($view_id);
        return view('backend.pages.teamPlayer.teamPlayerView',compact('viewTeamPlayer'));
    }

    //Delete
    public function teamPlayerDelete($tp_id){
        $deletePlayer=TeamPlayer::find($tp_id);
        $deletePlayer->delete();

        notify()->success('Team Player Deleted successfully'); 
        return redirect()->back();
    }
}
