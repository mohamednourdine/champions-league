<?php

namespace App\Repositories;

use App\Models\Match;
use App\Models\Team;
use App\Models\Week;

class MatchRepository
{

    protected $team;
    protected $match;
    protected $week;

    public function __construct(Team $team, Match $match, Week $week)
    {
        $this->team  = $team;
        $this->match = $match;
        $this->week  = $week;
    }


    public function getTeamsId()
    {
        return $this->team->pluck('id')->toArray();
    }

    public function getWeeks()
    {
        return $this->week->get();
    }

}
