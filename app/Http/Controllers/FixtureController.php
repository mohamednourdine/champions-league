<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Repositories\FixtureRepository;
use App\Repositories\MatchRepository;
use App\Services\ToAndFroMatchFixture;
use Illuminate\Http\Request;

class FixtureController extends Controller
{

    private $fixtureRepository;
    private $matchRepository;

    public function __construct(FixtureRepository $fixtureRepository, MatchRepository $matchRepository)
    {
        $this->fixtureRepository = $fixtureRepository;
        $this->matchRepository    = $matchRepository;
        $this->appInitialization();
    }

    public function appInitialization()
    {

        if (!$this->fixtureRepository->checkStanding()) {
            $this->fixtureRepository->createStanding();
        }

        if (!$this->matchRepository->checkIfFixturesDrawn()) {
            $this->createMatcheFixtures();
        }
    }

    public function appStart()
    {
        $matches = $this->matchRepository->getFixture()->groupBy('week_id');

        return view('home',[
                'standing' => $this->fixtureRepository->getAll(),
                'weeks' => $this->matchRepository->getWeeks(),
                'matches' => $matches,
            ]);

    }

    public function createMatcheFixtures()
    {
        $drawService = new ToAndFroMatchFixture($this->matchRepository->getAllTeamsIDs());
        $this->matchRepository->createFixture($drawService->generateFixturesPlan());
    }

    public function resetAll()
    {
        $this->matchRepository->truncateMatches();
        $this->fixtureRepository->truncateStanding();
        $this->createMatcheFixtures();

        return response()->json(['status' => 'ok',
            'weeks' => $this->matchRepository->getWeeks(),
            'matches' => $this->matchRepository->getFixture()->groupBy('week_id')
        ], 200);
    }

    public function getMatchResults()
    {
        return response()->json(['status' => 'ok',
            'weeks' => $this->matchRepository->getWeeks(),
            'matches' => $this->matchRepository->getFixture()->groupBy('week_id')
        ], 200);
    }

    public function getStandings()
    {
        return response()->json($this->fixtureRepository->getAll());
    }

    public function homeTeamFavorStatus()
    {
        return response()->json($this->matchRepository->homeTeamFavorStatus());
    }

    public function getFixtures()
    {
        $weeks   = $this->matchRepository->getWeeks();
        $fixture = $this->matchRepository->getFixture()->groupBy('week_id');
        return response()->json(['status' => 'ok', 'weeks' => $weeks, 'items' => $fixture]);
    }


    public function settings(Request $request){

        $settings = Setting::first();
        $settings->home_team_favor = $request->home_team_favor ;
        $settings->save();

        return response()->json(['status' => 'ok']);

    }
}
