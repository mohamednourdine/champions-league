<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo'
    ];


    public function standings()
    {
        return $this->hasMany('App\Models\Standing');
    }

    public function home_matches()
    {
        return $this->hasMany('App\Models\Match', 'home_team_id', 'id');
    }

    public function away_matches()
    {
        return $this->hasMany('App\Models\Match', 'away_team_id', 'id');
    }

}
