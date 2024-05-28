<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function league()
    {
        return $this->belongsTo(League::class, 'leagueId');
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'homeTeamId');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'awayTeamId');
    }

    // public function teamLeague(){
    //     return $this->belongsTo(TeamLeague::class, '');
    // }
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function updatePointTable()
    {
        $homeTeam = PointTable::where('team_id', $this->homeTeamId)->where('league_id', $this->leagueId)->first();
        $awayTeam = PointTable::where('team_id', $this->awayTeamId)->where('league_id', $this->leagueId)->first();

        if (!$homeTeam || !$awayTeam) {
            return;
        }

        // Update match count
        $homeTeam->match += 1;
        $awayTeam->match += 1;

        // Update win, lose, and points based on scores
        if ($this->home_team_score > $this->away_team_score) {
            $homeTeam->win += 1;
            $awayTeam->lose += 1;
            $homeTeam->points += 2; // Assuming a win gives 2 points
        } else if ($this->home_team_score < $this->away_team_score) {
            $awayTeam->win += 1;
            $homeTeam->lose += 1;
            $awayTeam->points += 2;
        } else {
            // Handle draw scenario if needed
        }

        // Save updated point tables
        $homeTeam->save();
        $awayTeam->save();
    }
}
