<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Season;
use App\Models\Team;
use App\Models\TeamLeague;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamLeagueController extends Controller
{
    public function teamLeagueList(){
        $varTeamLeague=TeamLeague::with(['league','team','season'])->get();
        // dd( $varTeamLeague);
        return view('backend.pages.teamLeague.teamLeagueList',compact('varTeamLeague'));
    }

    public function teamLeagueForm(){
        $varLeague=League::all();
        $varTeam = Team::all();
        $varSeason = Season::all();
      
        return view('backend.pages.teamLeague.teamLeagueForm',compact('varLeague','varTeam','varSeason'));
    }

    public function viewTeamLeagueForm(Request $request){
        $chechValidation=Validator::make($request->all(),[
            'league_id'=>'required',
            'team_id'=>'required',
            'season_id'=>'required'
        ]);
        if($chechValidation->fails()){
            notify()->error($chechValidation->getMessageBag());
            return redirect()->back();
        }

        // dd( $request->all());
        TeamLeague::create([
            
            'league_id'=>$request->league_id,
            'team_id'=>$request->team_id,
            'season_id'=>$request->season_id,
        ]);
        notify()->success('Create succesful');
        return redirect()->route('teamLeague.form');
    }


    //Delete
    public function teamLeagueDelete($delete_id){
        $deleteTeamLeague=TeamLeague::find($delete_id);
        $deleteTeamLeague->delete();

        notify()->success('Deleted successfully'); 
        return redirect()->back();
    }
}
