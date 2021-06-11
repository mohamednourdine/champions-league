<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Team;
use App\Models\Week;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::transaction(function() {
            Team::insert([
                ['name' => 'Chelsea', 'logo' => 'Chelsea-FC-icon.png', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => 'FC Barcelona', 'logo' => 'FC-Barcelona-icon.png', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => 'Manchester United', 'logo' => 'Manchester-United-Fc.png', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['name' => 'Real Madrid', 'logo' => 'Real-Madrid-icon.png', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]
            ]);
        });


        DB::transaction(function() {
            Week::insert([
                ['title' => '1st Week', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => '2nd Week', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => '3rd Week', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
                ['title' => '4th Week', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ]);
        });

        DB::transaction(function() {
            Setting::insert([
                ['home_team_favor' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ]);
        });

    }
}
