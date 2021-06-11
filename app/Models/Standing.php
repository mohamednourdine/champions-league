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
}
