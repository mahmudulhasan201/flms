<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamLeague extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function league(){
        return $this->belongsTo(League::class,'league_id');
    }  

    public function team(){
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id');
    }
}
