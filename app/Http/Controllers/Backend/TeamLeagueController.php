<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Team;
use App\Models\TeamLeague;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamLeagueController extends Controller
{
    public function teamLeagueList(){
        $varTeamLeague=TeamLeague::with(['league','team'])->get();
        // dd( $varTeamLeague);
        return view('backend.pages.teamLeague.teamLeagueList',compact('varTeamLeague'));
    }

    public function teamLeagueForm(){
        $varLeague=League::all();
        $varTeam = Team::all();
        return view('backend.pages.teamLeague.teamLeagueForm',compact('varLeague','varTeam'));
    }

    public function viewTeamLeagueForm(Request $request){
        $chechValidation=Validator::make($request->all(),[
            'league_id'=>'required',
            'team_id'=>'required'
        ]);
        if($chechValidation->fails()){
            notify()->error($chechValidation->getMessageBag());
            return redirect()->back();
        }
        TeamLeague::create([
            'league_id'=>$request->league_id,
            'team_id'=>$request->team_id,
        ]);
        notify()->success('create succesful');
        return redirect()->route('teamLeague.form');
    }
}
