<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Fixture;
use App\Models\League;
use App\Models\Player;
use App\Models\PointTable;
use App\Models\Team;
use App\Models\TeamLeague;
use App\Models\TeamPlayer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebpageController extends Controller
{   //Frontend Homepage
    public function homepage()
    {
        $today = Carbon::today();
        $matches = Fixture::where('date', '>=', $today)
            ->orderBy('date', 'asc')
            ->first();
        // dd($matches);
        return view('frontend.pages.home', compact('matches'));
    }


    //League Page
    public function league()
    {
        // $data = League::with('season')->where('status', 'Active')->where('season_id', '1')->get();
        $data = League::with('season')->where('status', 'Active')->get();

        return view('frontend.pages.league.leagueForm', compact('data'));
    }

    //View League's Team List
    public function teamList(Request $request)
    {
        $leagues = League::all();
        $selectedLeague = $request->input('league_id'); // Get the selected league ID from the request

        // Fetch teams based on the selected league
        if ($selectedLeague) {
            $teams = TeamLeague::with('team')->where('league_id', $selectedLeague)->get();
            $league = League::find($selectedLeague);
        } else {
            $teams = [];
            $league = null;
        }
        return view('frontend.pages.league.teamListForm', compact('leagues', 'teams', 'league', 'selectedLeague'));
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

        if (auth('teamGuard')->user()->status == 'Approved') {
            notify()->error('This team is already in a different league');
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
        PointTable::create([
            'league_id' => $varTeamLeague->id,
            'team_id' => auth('teamGuard')->user()->id,
        ]);

        return view('frontend.pages.joinLeague', compact('varTeam'));
    }


    //Player List
    public function playerList()
    {
        $data = Player::where('status', 'active')->paginate(10);
        // $data = Player::paginate(10);
        return view('frontend.pages.leaguePlayerList', compact('data'));
    }



    //Team Registration Form
    public function registrationForm()
    {
        return view('frontend.pages.teamRegistration.registrationForm');
    }

    public function doRegistration(Request $request)
    { 
        // dd($request->all());

        $checkValidation = Validator::make($request->all(), [
            'team_name' => 'required',
            'team_logo' => 'image',
            'coach_name' => 'required',
            'owner_name' => 'required',
            'owner_email' => 'required',
            'password' => 'required',
        ]);
        if ($checkValidation->fails()) {
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }
        $fileName = '';
        if ($request->hasFile('team_logo')) {
            $fileName = date('YmdHis') . '.' . $request->file('team_logo')->getClientOriginalExtension();
            $request->file('team_logo')->storeAs('/team', $fileName);
        }


        Team::create([
            'teamName' => $request->team_name,
            'teamLogo' => $request->team_logo,
            'coachName' => $request->coach_name,
            'ownerName' => $request->owner_name,
            'ownerEmail' => $request->owner_email,
            'password' => bcrypt($request->password),
            // 'status' => $request->status,
        ]);
        notify()->success("Registration Successful");
        return redirect()->route('homepage');
    }


    //Team Login
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
            // dd($team->status);
            if ($team->status == 'Approved') {

                notify()->success("Login Succcessful");
                return redirect()->route('league');
            } else {
                auth()->guard('teamGuard')->logout();
                notify()->error("Team not yet approved. Admin approval needed");
                return redirect()->back();
            }
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
