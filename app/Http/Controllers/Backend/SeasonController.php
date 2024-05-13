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

    //Edit
    public function seasonEdit(Request $request, $edit_id){ 
        $editSeason=Season::find($edit_id);
        return view('backend.pages.season.seasonEdit',compact('editSeason'));
    }

    public function seasonUpdate(Request $request,$update_id){
        $updateSeason=Season::find($update_id);

        $chechValidation=Validator::make($request->all(),[
            'name'=>'required',
            'status'=>'required'
        ]);
        if($chechValidation->fails()){

            notify()->error($chechValidation->getMessageBag());
            return redirect()->back();
        }


        $updateSeason->update([
            'seasonName'=>$request->name,
            'status'=>$request->status,
        ]);
        notify()->success('Update succesful');
        return redirect()->route('season.list');
    }


    //View
    public function seasonView($view_id){
        $viewSeason=Season::find($view_id); 
        return view('backend.pages.season.seasonView',compact('viewSeason'));  
    }


    //Delete
    public function seasonDelete($s_id){
        // dd($s_id->all());
        $deleteSeason= Season::find($s_id);
        $deleteSeason->delete();

        notify()->success("Delete Successful.");
        return redirect()->back();
    }
}
