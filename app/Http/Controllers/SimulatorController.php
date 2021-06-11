<?php

namespace App\Http\Controllers;

use App\Repositories\MatchRepository;
use App\Repositories\FixtureRepository;
use App\Services\MatchSimulator;

class SimulatorController extends Controller
{

    private $fixtureRepository;
    private $matchRepository;

    public function __construct(FixtureRepository $fixtureRepository, MatchRepository $matchRepository)
    {
        $this->fixtureRepository = $fixtureRepository;
        $this->matchRepository    = $matchRepository;
    }

    public function playAllWeeks()
    {
        $matches = $this->matchRepository->getAllMatches();
        $bulkMatchSimulator = new MatchSimulator($this->fixtureRepository, $this->matchRepository);
        $bulkMatchSimulator->simulateAllMatches($matches);
        return response()->json(['status' => 'ok'], 200);
    }

    public function playWeekly($week)
    {
        $matches = $this->matchRepository->getMatchesFromWeek($week);
        $matchSimulator = new MatchSimulator($this->fixtureRepository, $this->matchRepository);
        $matchSimulator->simulateAllMatches($matches);
        $result = $this->matchRepository->getFixtureByWeekId($week);

        return response()->json([
            'status' => 'ok',
            'matches' => $result
        ], 201);
    }
}
