<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fixture;
use App\Models\League;
use App\Models\Venue;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FixtureController extends Controller
{
   public function fixtureList(){
    // $makeFixture = Fixture::paginate(5);
    $makeFixture=Fixture::with('league','venue')->paginate(5);
    // dd(($makeFixture->all()));
    return view('backend.pages.fixture.fixtureList', compact('makeFixture'));
   } 

   public function fixtureForm(){
    $makeFixture=League::all();
    $venueFixture=Venue::all();
    return view('backend.pages.fixture.fixtureForm',compact('makeFixture','venueFixture'));
   }

   public function submitFixtureForm(Request $request){

    $checkValidation=Validator::make($request->all(),[
      'league_id'=>'required',
     'home_team_id'=>'required',
      'awaay_team_id'=>'required',
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
      'awayTeamId'=>$request->awaay_team_id,
      'session'=>$request->session,
      'date'=>$request->date,
      'venue_id'=>$request->venue_id,
     ]); 
     notify()->success('Create Successful'); 
     return redirect()->back();
   }

   public function fixtureDelete ($f_id){
    $deleteFixture=Fixture::find($f_id);
    
    $deleteFixture->delete();

    notify()->success('Delete successfully.'); 
    return redirect()->back();
   }
}
