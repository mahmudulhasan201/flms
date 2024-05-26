<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Season;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class LeagueController extends Controller
{
    public function leagueList()
    {
        $data = League::paginate(5);
        return view('backend.pages.league.l-list', compact('data'));
    }

    public function leagueForm()
    {
        $season = Season::all();
        return view('backend.pages.league.form', compact('season'));
    }

    public function submitLeagueForm(Request $request)
    {
        $checkValidation = Validator::make($request->all(), [
            'name' => 'required',
            'start_date' => 'required',
            'number_of_teams' => 'required',
            'season_id' => 'required',
            'league_logo' => 'image',
            'status' => 'required',
        ]);
        if ($checkValidation->fails()) {
            notify()->error($checkValidation->getMessageBag());
            // notify()->error('something went wrong');
            return redirect()->back();
        }

        $leagueLogoPart = '';
        if ($request->hasFile('league_logo')) {
            $leagueLogoPart = date('YmdHis') . '.' . $request->file('league_logo')->getClientOriginalExtension();
            $request->file('league_logo')->storeAs('/league', $leagueLogoPart);
        }

        $startDate = Carbon::parse($request->date);
        $endDate = $startDate->addMonth();

        League::create([
            'leagueName' => $request->name,
            'starting_date' => $startDate,
            'ending_date' => $endDate,
            'numberOfTeams' => $request->number_of_teams,
            'season_id' => $request->season_id,
            'leagueLogo' => $leagueLogoPart,
            'status' => $request->status,
        ]);
        notify()->success('create successful');
        return redirect()->route('league.form');
    }

    //Edit
    public function leagueEdit(Request $request, $edit_id)
    {
        $editLeague = League::find($edit_id);
        $season = Season::all();
        return view('backend.pages.league.editLeague', compact('editLeague', 'season'));
    }

    public function leagueUpdate(Request $request, $update_id)
    {
        $updateLeaue = League::find($update_id);

        $checkValidation = Validator::make($request->all(), [
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'number_of_teams' => 'required',
            'season_id' => 'required',
            'league_logo' => 'image',
            'status' => 'required',
        ]);
        if ($checkValidation->fails()) {
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }

        $leagueLogoPart = '';
        if ($request->hasFile('league_logo')) {
            $leagueLogoPart = date('YmdHis') . '.' . $request->file('league_logo')->getClientOriginalExtension();
            File::delete('images/league/' . $updateLeaue->leagueLogo);
            $request->file('league_logo')->storeAs('/league', $leagueLogoPart);
        }

        $updateLeaue->update([
            'leagueName' => $request->name,
            'leagueLogo' => $leagueLogoPart,
            'status' => $request->status,
        ]);
        notify()->success('Update successful');
        return redirect()->route('league.list');
    }

    //View
    public function leagueView($view_id)
    {
        $viewLeague = League::find($view_id);
        return view('backend.pages.league.viewLeague', compact('viewLeague'));
    }

    //Delete
    public function leagueDelete($l_id)
    {
        $deleteLeague = League::find($l_id);
        $deleteLeague->delete();

        notify()->success("Delete Successful.");
        return redirect()->back();
    }
}
