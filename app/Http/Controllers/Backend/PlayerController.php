<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

        //Validation
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

        //File Handling
        $playerPhotoPart='';
        if($request->hasFile('photo')){
            $playerPhotoPart=date('YmdHis').'.'.$request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->storeAs('/player',$playerPhotoPart);
        }

        //Store Data
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


    //Edit,View,Delete

    public function playerEdit(Request $request, $pl_id){
        $player=Player::find($pl_id);
        return view ('backend.pages.player.playerEdit',compact('player'));  
    }

    public function playerUpdate(Request $request, $playerU_id){
        $player=Player::find($playerU_id);

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
            File::delete('images/player/' . $player->playerImage);
            $request->file('photo')->storeAs('/player',$playerPhotoPart);
        }
        $player->update([
            'fullName'=>$request->player_name, 
            'born'=>$request->born,
            'birthPlace'=>$request->birth_place,
            'height'=>$request->height,
            'playingRole'=>$request->playing_role,
            'battingStyle'=>$request->batting_style,
            'bowlingStyle'=>$request->bowling_style,
            'playerImage'=> $playerPhotoPart
        ]);
        notify()->success("Update Successful.");
        return redirect()->route('player.list');
    }


    public function playerView($player_id){
        $player=Player::find($player_id);
        return view('backend.pages.player.playerView',compact('player'));
    }


    public function playerDelete($p_id){
        $player=Player::find($p_id);
        $player->delete();

        notify()->success('player deleted successfully'); 
        return redirect()->back();
    }
}
  
