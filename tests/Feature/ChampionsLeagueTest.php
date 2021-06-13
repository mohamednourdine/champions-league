<?php

namespace Tests\Feature;

use App\Services\MatchSimulator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Match;
use Tests\TestCase;

class ChampionsLeagueTest extends TestCase
{

    private $matchRepository;
    private $standingRepository;
    private $match;


    /** @test */
    public function simulationMatchStanding(){
        $this->assertTrue(true);
        // TODO: MATCH SIMULATION
    }

}
