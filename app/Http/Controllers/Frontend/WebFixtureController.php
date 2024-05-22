<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Fixture;
use App\Models\League;
use Illuminate\Http\Request;

class WebFixtureController extends Controller
{
    public function webFixture(Request $request)
    {
        $leagues = League::all(); // Fetch all leagues
        $selectedLeague = $request->input('league_id'); // Get the selected league ID from the request

        // Fetch teams based on the selected league
        if ($selectedLeague) {
            $matches = Fixture::with('homeTeam', 'awayTeam', 'venue')->where('leagueId', $selectedLeague)->get();
            $league = League::find($selectedLeague);
        } else {
            $matches = [];
            $league = null;
        }
        // dd($matches);

        return view('frontend.pages.webFixture.fixture', compact('leagues', 'matches', 'league', 'selectedLeague'));
    }

    public function fixtureAllMatches(Request $request)
    {
        $leagues = League::all(); // Fetch all leagues
        $selectedLeague = $request->input('league_id'); // Get the selected league ID from the request

        // Fetch teams based on the selected league
        if ($selectedLeague) {
            $matches = Fixture::with('homeTeam')->where('leagueId', $selectedLeague)->get();
            $league = League::find($selectedLeague);
        } else {
            $teams = [];
            $league = null;
        }

        return view('frontend.pages.webFixture.fixture', compact('leagues', 'matches', 'league', 'selectedLeague'));
    }
}
