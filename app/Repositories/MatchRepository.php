<?php

namespace App\Repositories;

use App\Models\Match;
use App\Models\Setting;
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

    public function getAllTeamsIDs()
    {
        return $this->team->pluck('id')->toArray();
    }

    public function getWeeks()
    {
        return $this->week->get();
    }

    public function homeTeamFavorStatus(){
        $settings = Setting::first();
        return $settings->home_team_favor ? true : false;
    }

    public function createFixture($fixtures)
    {
        foreach ($fixtures as $fixture) {
            $this->match->create([
                'home_team_id' => $fixture['home'],
                'away_team_id' => $fixture['away'],
                'week_id' => $fixture['week']
            ]);
        }
    }

    public function checkIfFixturesDrawn()
    {
        return $this->match->count() ? true : false;
    }


    public function getFixture()
    {

        return $this->match->select(
            'matches.id',
            'matches.match_status',
            'matches.week_id',
            'matches.home_team_goals',
            'matches.away_team_goals',
            'week_id',
            'home.name as home_team_id',
            'home.logo as home_logo',
            'away.logo as away_logo',
            'away.name as away_team_id')
            ->join('weeks', 'weeks.id', '=', 'matches.week_id')
            ->join('teams as home', 'home.id', '=', 'matches.home_team_id')
            ->join('teams as away', 'away.id', '=', 'matches.away_team_id')
            ->orderBy('id', 'ASC')
            ->get();
    }


    public function getFixtureByWeekId($week_id)
    {

        return $this->match->select(
            'matches.id',
            'matches.match_status',
            'matches.week_id',
            'matches.home_team_goals',
            'matches.away_team_goals',
            'week_id',
            'weeks.title',
            'home.logo as home_logo',
            'away.logo as away_logo',
            'home.name as home_team',
            'away.name as away_team')
            ->join('weeks', 'weeks.id', '=', 'matches.week_id')
            ->join('teams as home', 'home.id', '=', 'matches.home_team_id')
            ->join('teams as away', 'away.id', '=', 'matches.away_team_id')
            ->where('matches.week_id', '=', $week_id)
            ->orderBy('matches.id', 'ASC')
            ->get();
    }


    public function getMatchesFromWeek($week)
    {
        return $this->match->where([['week_id', '=', $week], ['match_status', '=', 0]])->get();
    }


    public function getAllMatches($status = 0)
    {
        return $this->match->where('match_status', '=', $status)->get();
    }

    public function getAllMatchesByTeamId($teamId)
    {
        return $this->match
            ->where(function ($q) use ($teamId) {
                $q->where('home_team_id', '=', $teamId)
                    ->orWhere('away_team_id', '=', $teamId);
            })
            ->where('match_status', '=', 0)
            ->get();
    }


    public function updateMatchScore($homeScore, $awayScore, $home, $away)
    {
        $goalDrawn = abs($awayScore - $homeScore);

        if ($homeScore > $awayScore) {
            $home->won($goalDrawn);
            $away->lose($goalDrawn);

        } elseif ($awayScore > $homeScore) {
            $away->won($goalDrawn);
            $home->lose($goalDrawn);
        } else {
            $home->draw();
            $away->draw();
        }

        $home->save();
        $away->save();
    }



    public function truncateMatches()
    {
        $this->match->truncate();
    }

    public function resultSaver($match, $homeScore, $awayScore)
    {
        $match->home_team_goals = $homeScore;
        $match->away_team_goals = $awayScore;
        $match->match_status         = 1;
        return $match->save();
    }


}
