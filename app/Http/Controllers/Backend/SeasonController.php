<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeasonController extends Controller
{
    public function seasonList(){ 
        $data=Season::all();
        return view('backend.pages.season.s-list', compact('data'));
    }

    public function seasonForm(){
        return view('backend.pages.season.form');
    }

    public function viewSeason(Request $request){

        $chechValidation=Validator::make($request->all(),[
            'name'=>'required',
            'status'=>'required'
        ]);
        if($chechValidation->fails()){

            notify()->error($chechValidation->getMessageBag());
            return redirect()->back();
        }


        Season::create([
            'seasonName'=>$request->name,
            'status'=>$request->status,
        ]);

        notify()->success('create succesful');
        return redirect()->route('season.form');
    }

    //Edit View Delete
    public function seasonDelete($s_id){
        // dd($s_id->all());
        $deleteSeason= Season::find($s_id);
        $deleteSeason->delete();


        notify()->success("Delete Successful.");
        return redirect()->back();
    }
}
