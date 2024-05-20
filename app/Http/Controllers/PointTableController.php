<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\PointTable;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PointTableController extends Controller
{
    public function pointTableList(){
        $makePointTable= PointTable::with('league','team')->paginate(10);
        // dd($makePointTable);
        return view('backend.pages.pointTable.pointTableList',compact('makePointTable'));
    }

    public function pointTableForm(){
        $leaguePointTable=League::all();
        $teamPointTable=Team::all();
        return view('backend.pages.pointTable.pointTableForm',compact('leaguePointTable','teamPointTable'));
    }

    public function submitPointTableform(Request $request){

        $checkValidation=Validator::make($request->all(),[
            'league_id'=>'required',
           'team_id'=>'required',
            'match'=>'required',
            'win'=>'required',
            'lose'=>'required',
            'points'=>'required',
            'status'=>'required',
          ]);
          if($checkValidation->fails()){
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
          }


        PointTable::create([
            'league_id'=>$request->league_id,
            'team_id'=>$request->team_id,
            'match'=>$request->match,
            'win'=>$request->win,
            'lose'=>$request->lose,
            'points'=>$request->points,
            'status'=>$request->status,
        ]);
        notify()->success('Create Successful'); 
        return redirect()->back();
    }



    public function PointTableDelete($pt_id){
        $deletePointTable=PointTable::find($pt_id);
        $deletePointTable->delete();
    
        notify()->success('Delete successfully.'); 
        return redirect()->back();
    }
}
