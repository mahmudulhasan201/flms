<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\League;
use App\Models\Player;
use App\Models\Team;
use App\Models\TeamLeague;
use App\Models\TeamPlayer;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MyTeamController extends Controller
{

    public function teamProfile()
    {
        $team = Team::find(auth('teamGuard')->user()->id);
        return view('frontend.pages.team.teamProfile',compact('team'));
    }

    public function viewInvitation()
    {
        $invitations = Invitation::where('team_id', auth('teamGuard')->user()->id)->get();
        // dd($invitations->all());
        return view('frontend.pages.team.invitation', compact('invitations'));
    }


    //Delete player from Team profile
    public function deleteInvitation($id)
    {
        $invitation = Invitation::find($id);
        if ($invitation) {
            $invitation->delete();
            notify()->success("Delete Successful.");
        } else {
            notify()->error("Invitation not found.");
        }
        return redirect()->back();
    }


    public function addPlayerToTeam($id)
    {
        $teamId = auth('teamGuard')->user()->id;

        $alreadyExist = TeamPlayer::where('player_id', $id)->where('team_id', $teamId)->first();

        if ($alreadyExist) {
            // dd("already exist");
            notify()->error("player already exist in your team");
            return redirect()->back();
        }
        // dd("not exist");
        $playerCount = TeamPlayer::where('team_id', $teamId)->count();
        if ($playerCount >= 15) {
            notify()->error("Your team already has the maximum number of players");
            return redirect()->back();
        }

        //send player request
        $duplicate = Invitation::where('team_id', $teamId)->where('player_id', $id)->first();
        // dd($duplicate);
        if (!$duplicate) {
            Invitation::create([
                'team_id' => $teamId,
                'player_id' => $id,
            ]);



            // TeamPlayer::create([
            //     'team_id' => auth('teamGuard')->user()->id,
            //     'player_id' => $id,
            //     // 'status update
            // ]);

            // $playerStatus = Player::find($id);
            // $playerStatus->update([
            //     'status' => 'inactive'
            // ]);

            // notify()->success('Player is now in your Team');
            notify()->success('Request has been sent to the Player');
            return redirect()->route('league.player.list');
        } else {
            notify()->error('This player already has been invited');
            return redirect()->route('league.player.list');
        }
    }

    //Edit Team Profile
    public function editTeamProfile($id){
        $team=Team::find($id);
        return view('frontend.pages.team.editTeamProfile',compact('team'));
    }

    public function updateTeamProfile(Request $request,$id){
        $team=Team::find($id);

        $checkValidation = Validator::make($request->all(), [
            'Name' => 'required',
            'teamlogo' => 'image',
            'cname' => 'required',
            'Oname' => 'required',
            'Oemail' => 'required',
        ]);
        if ($checkValidation->fails()) {
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }
        $fileName = '';
        if ($request->hasFile('teamlogo')) {
            $fileName = date('YmdHis') . '.' . $request->file('teamlogo')->getClientOriginalExtension();
            $request->file('teamlogo')->storeAs('/team', $fileName);
            File::delete('images/team' . $team->teamLogo);
        }


        $team->update([
            'teamName' => $request->Name,
            'teamLogo' => $fileName,
            'coachName' => $request->cname,
            'ownerName' => $request->Oname,
            'ownerEmail' => strtolower($request->Oemail),  //strtolower means String To lower
            'status' => $request->status,
        ]);
        notify()->success('Update succesful');
        return redirect()->route('team.profile');
    }
}
