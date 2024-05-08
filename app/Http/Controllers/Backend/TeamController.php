<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function teamList(){

        $data=Team::paginate(5);
        return view('backend.pages.team.t-list',compact('data'));
    }

    public function teamForm(){
        return view('backend.pages.team.form');
    } 

    public function submitTeamForm(Request $request){
// dd($request->all());
        $checkValidation=Validator::make($request->all(),[
            'Name'=>'required',
            'teamlogo'=>'image',
            'cname'=>'required',
            'Oname'=>'required',
            'Oemail'=>'required',
            'ownerpassword'=>'required',
        ]);
        if($checkValidation->fails()){
            // notify()->error("something went wrong");
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }
        $fileName='';
        if($request->hasFile('teamlogo')){
            $fileName=date('YmdHis').'.'.$request->file('teamlogo')->getClientOriginalExtension();
            $request->file('teamlogo')->storeAs('/team',$fileName);
        }
        

        Team::create([
            'teamName'=>$request->Name,  
            'teamLogo'=>$fileName,
            'coachName'=>$request-> cname,
            'ownerName'=>$request->Oname,
            'ownerEmail'=>strtolower($request->Oemail),  //strtolower=String To lower
            'password'=>bcrypt($request->ownerpassword),
             'status'=>$request->status,
        ]);
        notify()->success('create succesful'); 
        return redirect()->route('team.form');
    }
}
