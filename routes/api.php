<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FixtureController;
use App\Http\Controllers\SimulatorController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/reset-all', [FixtureController::class, 'resetAll']);
Route::post('/settings', [FixtureController::class, 'settings']);


Route::get('/get-matches-results', [FixtureController::class, 'getMatchResults']);
Route::get('/get-matches-favpur-status', [FixtureController::class, 'homeTeamFavorStatus']);
Route::get('/fixtures', [FixtureController::class, 'getFixtures']);

Route::get('/standings', [FixtureController::class, 'getStandings']);
Route::get('/play-all-weeks', [SimulatorController::class, 'playAllWeeks']);
Route::get('/play-week/{weekId}', [SimulatorController::class, 'playWeekly']);
