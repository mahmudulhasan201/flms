<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Player extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public function team()
    {
        return $this->hasOne(TeamLeague::class);
    }
}
