<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Player;
use App\Models\Team;
use App\Models\TeamLeague;
use App\Models\TeamPlayer;
use Illuminate\Http\Request;


class WebpageController extends Controller
{   //Frontend Homepage
    public function homepage()
    {
        return view('frontend.pages.home');
    }


    //League Page
    public function league()
    {
        // $data = League::with('season')->where('status', 'Active')->where('season_id', '1')->get();
        $data = League::with('season')->where('status', 'Active')->get();

        return view('frontend.pages.league.leagueForm', compact('data'));
    }

    //View League's Team List
    public function teamList()
    {
        $varTeamList = TeamLeague::all();
        return view('frontend.pages.league.teamListForm', compact('varTeamList'));
    }
    //Join Button
    public function joinLeague($leagueId)
    {
        $existingTeamLeague = TeamLeague::where('league_id', $leagueId)
            ->where('team_id', auth('teamGuard')->user()->id)
            ->exists();
        if ($existingTeamLeague) {

            // User is already in the league, no need to add again
            notify()->error('You are already in this league.');
            return redirect()->route('homepage');
        }

        $varTeamLeague = League::Find($leagueId);
        TeamLeague::create([
            'league_id' => $varTeamLeague->id,
            'team_id' => auth('teamGuard')->user()->id,
            'season_id' => $varTeamLeague->season_id,
        ]);

        $varTeam = TeamLeague::with(['league', 'team'])->get();
        //insert into team_league
        return view('frontend.pages.joinLeague', compact('varTeam'));
    }


    //Player List
    public function playerList()
    {
        $data = Player::where('status', 'active')->paginate(10);
        // $data = Player::paginate(10);
        return view('frontend.pages.leaguePlayerList', compact('data'));
    }



    //Frontend Registration Form
    public function registrationForm()
    {
        return view('frontend.pages.teamRegistration.registrationForm');
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
            return redirect()->route('league');
            // } else {
            //     auth()->guard('teamGuard')->logout();
            //     notify()->error("Team not yet approved.");
            //     return redirect()->route('homepage');
            // }
        }

        notify()->error("invalid email or password");
        return redirect()->back();
    }

    //Team LogOut
    public function teamLogout()
    {
        auth()->guard('teamGuard')->logout();
        return redirect()->route('homepage');
    }


    //MyTeam Page
    public function myTeam()
    {
        // dd("hello");
        $data = TeamPlayer::with('player', 'team')->where('team_id', auth('teamGuard')->user()->id)->get();
        // dd($data);
        return view('frontend.pages.team.myTeam', compact('data'));
    }
}
