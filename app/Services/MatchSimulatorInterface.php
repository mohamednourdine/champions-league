<?php

namespace App\Services;


interface MatchSimulatorInterface
{
    public function simulate($singleInput);

    public function simulateAllMatches($arrayInput);
}
