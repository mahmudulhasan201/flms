<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeagueController extends Controller
{
    public function leagueList(){
        $data=League::paginate(5);
        return view('backend.pages.league.l-list', compact('data'));
    }
 
    public function leagueForm()
    {
        return view('backend.pages.league.form');
    }

    public function submitLeagueForm(Request $request)
    {   
        $checkValidation=Validator::make($request->all(),[
            'name'=>'required',
            'league_logo'=>'image',
            'status'=>'required',
        ]); 
        if($checkValidation->fails()){
            notify()->error($checkValidation->getMessageBag());
            // notify()->error('something went wrong');
            return redirect()->back();
        }

        $leagueLogoPart='';
        if($request->hasFile('league_logo')){
            $leagueLogoPart=date('YmdHis').'.'.$request->file('league_logo')->getClientOriginalExtension();
            $request->file('league_logo')->storeAs('/league',$leagueLogoPart);
        }

        League::create([
            'leagueName'=>$request->name,
            'leagueLogo'=>$leagueLogoPart,
            'status'=>$request->status,
        ]);
        notify()->success('create successful');
        return redirect()->route('league.form');  
    }

    //Edit View Delete
    public function leagueDelete($l_id){
        $deleteLeague=League::find($l_id);
        $deleteLeague->delete();

        notify()->success("Delete Successful.");
        return redirect()->back();
    }
}
