<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamPlayer extends Model
{
    use HasFactory; 
    protected $guarded=[]; 

    public function player(){
        return $this->belongsTo(Player::class,'player_Id');
    }

    public function team(){
        return $this->belongsTo(Team::class,'team_Id');
    }
}
