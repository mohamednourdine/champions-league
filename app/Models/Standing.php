<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standing extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'won',
        'drawn',
        'lose',
        'goal_drawn',
        'points'
    ];

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function won($goalDrawn)
    {
        $this->played     += 1;
        $this->won        += 1;
        $this->points     += 3;
        $this->goal_drawn += $goalDrawn;
    }

    public function lose($goalDrawn)
    {
        $this->played     += 1;
        $this->goal_drawn += -$goalDrawn;
        $this->lose       += 1;
    }

    public function draw()
    {
        $this->played += 1;
        $this->drawn   += 1;
        $this->points += 1;
    }
}
