<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

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
            'password' =>bcrypt( $request->player_password),
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



    public function playerLoginForm()
    {
        return view('frontend.pages.webPlayer.playerLoginForm');
    }
}
