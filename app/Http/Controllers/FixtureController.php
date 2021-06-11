<?php

namespace App\Http\Controllers;

use App\Repositories\FixtureRepository;
use App\Repositories\MatchRepository;
use Illuminate\Http\Request;

class FixtureController extends Controller
{

    private $fixtureRepository;
    private $matchRepository;

    public function __construct(FixtureRepository $fixtureRepository, MatchRepository $matchRepository)
    {
        $this->fixtureRepository = $fixtureRepository;
        $this->matchRepository    = $matchRepository;
    }

    public function appStart(){

        return view(
            'home',
            [
                'weeks' => $this->matchRepository->getWeeks(),
            ]);

    }
}
