<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    public function playerList(){
        $data=Player::paginate(5);
        return view('backend.pages.player.playerList', compact('data'));
    }

    public function playerForm(){
        return view('backend.pages.player.playerForm');
    }

    public function viewPlayerForm(Request $request){

        $checkValidation=Validator::make($request->all(),[
            'player_name'=>'required',
            'born'=>'required',
            'birth_place'=>'required',
            'height'=>'required',
            'playing_role'=>'required',
            'batting_style'=>'required',
            'bowling_style'=>'required',
            'photo'=>'image',
        ]);
        if($checkValidation->fails()){
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }

        $playerPhotoPart='';
        if($request->hasFile('photo')){
            $playerPhotoPart=date('YmdHis').'.'.$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/player',$playerPhotoPart);
        }




        Player::create([
            'fullName'=>$request->player_name, 
            'born'=>$request->born,
            'birthPlace'=>$request->birth_place,
            'height'=>$request->height,
            'playingRole'=>$request->playing_role,
            'battingStyle'=>$request->batting_style,
            'bowlingStyle'=>$request->bowling_style,
            'playerImage'=>$playerPhotoPart,
        ]);
        notify()->success('create successful');
        return redirect()->route('player.form');  
    }
}
  
