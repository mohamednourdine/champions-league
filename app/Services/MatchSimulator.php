<?php

namespace App\Services;

use App\Models\Setting;
use App\Repositories\MatchRepository;
use App\Repositories\FixtureRepository;

class MatchSimulator implements MatchSimulatorInterface
{

    protected $FixtureRepository;
    protected $matchRepository;

    public function __construct(FixtureRepository $FixtureRepository, MatchRepository $matchRepository)
    {
        $this->FixtureRepository = $FixtureRepository;
        $this->matchRepository = $matchRepository;
    }

    public function simulate($match)
    {
        $home = $this->FixtureRepository->getStandingByTeamId($match->home_team_id);
        $away = $this->FixtureRepository->getStandingByTeamId($match->away_team_id);
        $homeScore = $this->generateScore(true);
        $awayScore = $this->generateScore(false);

        $this->updateMatchScore($homeScore, $awayScore, $home, $away);
        return $this->matchRepository->resultSaver($match, $homeScore, $awayScore);

    }

    public function simulateAllMatches($matches)
    {
        foreach ($matches as $match) {
            $this->simulate($match);
        }
    }

    public function updateMatchScore($homeScore, $awayScore, $home, $away)
    {
        $this->matchRepository->updateMatchScore($homeScore, $awayScore, $home, $away);
    }


    public function generateScore(bool $is_home)
    {

        if (Setting::first()->home_team_favor){
            return $is_home ? rand(0, 10) : rand(0, 7);
        }

        return rand(0, 10);

    }

}
