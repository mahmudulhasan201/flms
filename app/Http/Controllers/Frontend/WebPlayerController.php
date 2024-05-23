<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class WebPlayerController extends Controller
{
    public function playerRegistrationForm()
    {
        return view('frontend.pages.webPlayer.playerRegistrationForm');
    }

    public function doPlayerRegistration(Request $request)
    {
        Player::create([
            'fullName' => $request->player_name,
            'email' => $request->player_email,
            'password' => bcrypt($request->player_password),
            'born' => $request->born,
            'birthPlace' => $request->birth_place,
            'height' => $request->height,
            'playingRole' => $request->playing_role,
            'battingStyle' => $request->batting_style,
            'bowlingStyle' => $request->bowling_style,
            'playerImage' => $request->photo,
        ]);
        notify()->success('Player Registration Successful');
        return redirect()->route('homepage');
    }


    //Web Player Login
    public function playerLoginForm(){
        return view('frontend.pages.webPlayer.playerLoginForm');
    }

    public function doPlayerLogin(Request $request)
    {
        // dd($request->all());
        $loginInfo = ['email' => $request->email_address, 'password' => $request->password];
        $checkLogin = auth()->guard('playerGuard')->attempt($loginInfo);
        //dd($checkLogin);
        if ($checkLogin) {
            auth()->guard('teamGuard')->user();

            notify()->success("Login Succcessful");
            return redirect()->route('league');
        }

        notify()->error("invalid email or password");
        return redirect()->back();
    }

    //Web Player Logout
    public function playerLogout(){
        auth()->guard('playerGuard')->logout();
        return redirect()->route('homepage');
    }


    //web Player Profile
    public function showPlayerProfile(){
        $player = Player::find(auth('playerGuard')->user()->id);
        // dd($player);
        return view('frontend.pages.webPlayer.playerProfile',compact('player'));
    }


    //Edit Player Profile
    public function editPlayerProfile($id){
        $player=Player::find($id);
        return view('frontend.pages.webPlayer.playerProfileEdit',compact('player'));
    }

    public function updatePlayerProfile(Request $request,$id){
        $player=Player::find($id);

        $checkValidation = Validator::make($request->all(), [
            'player_name' => 'required',
            'player_email' => 'required',
            'player_password' => 'required',
            'born' => 'required',
            'birth_place' => 'required',
            'height' => 'required',
            'playing_role' => 'required',
            'batting_style' => 'required',
            'bowling_style' => 'required',
            'photo' => 'image',
        ]);
        if ($checkValidation->fails()) {
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }

        $playerPhotoPart = '';
        if ($request->hasFile('photo')) {
            $playerPhotoPart = date('YmdHis') . '.' . $request->file('photo')->getClientOriginalExtension();
            File::delete('images/player/' . $player->playerImage);
            $request->file('photo')->storeAs('/player', $playerPhotoPart);
        }
        $player->update([
            'fullName' => $request->player_name,
            'email' => $request->player_email,
            'password' => $request->player_password,
            'born' => $request->born,
            'birthPlace' => $request->birth_place,
            'height' => $request->height,
            'playingRole' => $request->playing_role,
            'battingStyle' => $request->batting_style,
            'bowlingStyle' => $request->bowling_style,
            'playerImage' => $playerPhotoPart
        ]);
        notify()->success("Update Successful.");
        return redirect()->route('player.profile');
    }
}
