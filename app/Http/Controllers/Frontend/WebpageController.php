<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Player;
use App\Models\Team;
use App\Models\TeamPlayer;
use Illuminate\Http\Request;


class WebpageController extends Controller
{
    public function homepage()
    {
        return view('frontend.pages.home');
    }

    public function match()
    {
        // $data = League::with('season')->where('status', 'Active')->where('season_id', '1')->get();
        $data = League::with('season')->where('status', 'Active')->get();

        return view('frontend.pages.matches', compact('data'));
    }

    public function joinLeague($leagueId)
    {

        //insert into team_league
        return view('frontend.pages.joinLeague');
    }

    public function playerList()
    {
        $data = Player::paginate(10);
        return view('frontend.pages.leaguePlayerList', compact('data'));
    }



    public function registrationForm()
    {
        return view('frontend.pages.customer.registrationForm');
    }

    public function doRegistration(Request $request)
    {
        // dd($request->all());
        Team::create([
            'teamName' => $request->team_name,
            'teamLogo' => $request->team_logo,
            'coachName' => $request->coach_name,
            'ownerName' => $request->owner_name,
            'ownerEmail' => $request->owner_email,
            'password' => bcrypt($request->password),
            'status' => $request->status,
        ]);
        notify()->success("Registration Successful");
        return redirect()->route('homepage');
    }

    //Frontend Login

    public function loginForm()
    {
        return view('frontend.pages.team.teamLogin');
    }

    public function doLogin(Request $request)
    {

        // dd($request->all());

        $loginInfo = ['ownerEmail' => $request->email_address, 'password' => $request->password];

        $checkLogin = auth()->guard('teamGuard')->attempt($loginInfo);

        //dd($checkLogin);

        if ($checkLogin) {
            $team = auth()->guard('teamGuard')->user();
            // if ($team->is_approved) {


            notify()->success("Login Succcessful");
            return redirect()->route('homepage');
            // } else {
            //     auth()->guard('teamGuard')->logout();
            //     notify()->error("Team not yet approved.");
            //     return redirect()->route('homepage');
            // }
        }

        notify()->error("invalid email or password");
        return redirect()->back();
    }
    public function teamLogout()
    {
        auth()->guard('teamGuard')->logout();
        return redirect()->route('homepage');
    }

    public function myTeam()
    {
        // dd("hello");
        $data = TeamPlayer::with('player', 'team')->where('team_id', 1)->get();
        return view('frontend.pages.team.myTeam', compact('data'));
    }
}
