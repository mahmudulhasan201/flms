<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    //Edit
    public function teamEdit(Request $request,$edit_id){
        $editTeam= Team::find($edit_id);
        return view('backend.pages.team.teamEdit',compact('editTeam'));
    }

    public function teamUpdate(Request $request, $update_id){
        $updateTeam=Team::find($update_id); 

        $checkValidation=Validator::make($request->all(),[
            'Name'=>'required',
            'teamlogo'=>'image',
            'cname'=>'required',
            'Oname'=>'required',
            'Oemail'=>'required',
            'ownerpassword'=>'required',
        ]);
        if($checkValidation->fails()){
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }
        $fileName='';
        if($request->hasFile('teamlogo')){
            $fileName=date('YmdHis').'.'.$request->file('teamlogo')->getClientOriginalExtension();
            $request->file('teamlogo')->storeAs('/team',$fileName);
            File::delete('images/team'. $updateTeam->teamLogo);
        }
        

        $updateTeam->update([
            'teamName'=>$request->Name,  
            'teamLogo'=>$fileName,
            'coachName'=>$request-> cname,
            'ownerName'=>$request->Oname,
            'ownerEmail'=>strtolower($request->Oemail),  //strtolower means String To lower
            'password'=>bcrypt($request->ownerpassword),
             'status'=>$request->status,
        ]);
        notify()->success('Update succesful'); 
        return redirect()->route('team.list');

    }



    //View
    public function teamView($t_id){
        $viewTeam=Team::find($t_id);

        return  view('backend.pages.team.teamView',compact('viewTeam'));
    }




    //Delete
    public function teamDelete($t_id){
        // dd($s_id->all());
        $deleteTeam= Team::find($t_id);
        $deleteTeam->delete();


        notify()->success("Delete Successful.");
        return redirect()->back();
    }
}
