<?php

namespace App\Services;


interface ToAndFroMatchInterface
{

    public function __construct(array $teams);

    public function generateFixturesPlan();

}
