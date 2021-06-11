<?php

namespace App\Repositories;

use App\Models\Standing;
use App\Models\Team;

class FixtureRepository
{

    private $standing;
    private $team;

    public function __construct(Standing $standing, Team $team)
    {
        $this->standing = $standing;
        $this->team = $team;
    }

}
