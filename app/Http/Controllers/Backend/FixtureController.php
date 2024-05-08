<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Fixture;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FixtureController extends Controller
{
   public function fixtureList(){
    return view('backend.pages.fixture.fixtureList');
   } 

   public function fixtureForm(){
    return view('backend.pages.fixture.fixtureForm');
   }

   public function submitFixtureForm(Request $request){

    $checkValidation=Validator::make($request->all(),[
     'home_team_id'=>'required',
      'awaay_team_id'=>'required',
      'session'=>'required',
      'date'=>'required',
      'vanue_id'=>'required',
    ]);
    if($checkValidation->fails()){
      notify()->error($checkValidation->getMessageBag());
      return redirect()->back();
    }


     Fixture::create([
      'homeTeamId'=>$request->home_team_id,
      'awayTeamId'=>$request->awaay_team_id,
      'session'=>$request->session,
      'date'=>$request->date,
      'vanueId'=>$request->vanue_id,
     ]); 
     notify()->success('Create Successful'); 
     return redirect()->back();
   }
}
