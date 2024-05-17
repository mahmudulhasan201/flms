<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory; 
    protected $guarded=[];

    public function season(){
        return $this->belongsTo(Season::class);
    }

    public function teamLeagues()
    {
        return $this->hasMany(TeamLeague::class);
    }
}
