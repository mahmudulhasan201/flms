<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fixture;
use App\Models\League;
use App\Models\Team;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FixtureController extends Controller
{
   public function fixtureList(){
    // $makeFixture = Fixture::paginate(5);
    $makeFixture=Fixture::with('league','venue','homeTeam','homeTeam')->paginate(5);
    // dd(($makeFixture->all()));
    return view('backend.pages.fixture.fixtureList', compact('makeFixture'));
   } 
 
   public function fixtureForm(){
    $makeFixture=League::all();
    $teamFixture=Team::all();
    $venueFixture=Venue::all();
    return view('backend.pages.fixture.fixtureForm',compact('makeFixture','venueFixture','teamFixture'));
   }

   public function submitFixtureForm(Request $request){

    $checkValidation=Validator::make($request->all(),[
      'league_id'=>'required',
     'home_team_id'=>'required',
      'away_team_id'=>'required',
      'session'=>'required',
      'date'=>'required',
      'venue_id'=>'required',
    ]);
    if($checkValidation->fails()){
      notify()->error($checkValidation->getMessageBag());
      return redirect()->back();
    }


     Fixture::create([
      'leagueId'=>$request->league_id,
      'homeTeamId'=>$request->home_team_id,
      'awayTeamId'=>$request->away_team_id,
      'session'=>$request->session,
      'date'=>$request->date,
      'venue_id'=>$request->venue_id,
     ]); 
     notify()->success('Create Successful'); 
     return redirect()->back();
   }

      //Edit
      public function fixtureEdit($edit_id){
        $team=Team::all();
        $league=League::all();
        $venue=Venue::all();
        $editFixture = Fixture::find($edit_id);
        return view('backend.pages.fixture.fixtureEdit',compact('editFixture','league','venue','team'));
      }

      public function fixtureUpdate(Request $request,$update_id){
        $updateFixture = Fixture::find($update_id);

        $checkValidation=Validator::make($request->all(),[
          'league_id'=>'required',
         'home_team_id'=>'required',
          'away_team_id'=>'required',
          'session'=>'required',
          'date'=>'required',
          'venue_id'=>'required',
        ]);
        if($checkValidation->fails()){
          notify()->error($checkValidation->getMessageBag());
          return redirect()->back();
        }
      $updateFixture->update([
          'leagueId'=>$request->league_id,
          'homeTeamId'=>$request->home_team_id,
          'awayTeamId'=>$request->awaay_team_id,
          'session'=>$request->session,
          'date'=>$request->date,
          'venue_id'=>$request->venue_id,
         ]); 
         notify()->success('Create Successful'); 
         return redirect()->route('fixture.list');
      }

   //View
   public function fixtureView($view_id){
    $viewFixture = Fixture::find($view_id);
    return view('backend.pages.fixture.fixtureView',compact('viewFixture'));
   }


//Delete
   public function fixtureDelete ($f_id){  
    $deleteFixture=Fixture::find($f_id);
    
    $deleteFixture->delete();

    notify()->success('Delete successfully.'); 
    return redirect()->back();
   }
}
