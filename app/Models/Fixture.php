<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;
    protected $guarded=[]; 


    public function league(){
        return $this->belongsTo(League::class, 'leagueId');
    }

    public function homeTeam(){
        return $this->belongsTo(Team::class,'homeTeamId');
    }

    public function awayTeam(){
        return $this->belongsTo(Team::class,'awayTeamId');
    }

    public function venue(){
        return $this->belongsTo(Venue::class);
    }

 
}


