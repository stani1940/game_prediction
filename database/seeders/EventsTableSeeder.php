<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $year = 2024;

        $fixtures = [
            ['home' => 'Germany', 'away' => 'Scotland', 'month' => 6, 'day' => 14, 'hour' => 21],
            ['home' => 'Hungary', 'away' => 'Switzerland', 'month' => 6, 'day' => 15, 'hour' => 19],
            ['home' => 'Spain', 'away' => 'Croatia', 'month' => 6, 'day' => 15, 'hour' => 19],
            ['home' => 'Italy', 'away' => 'Albania', 'month' => 6, 'day' => 15, 'hour' => 22],
            ['home' => 'Slovenia', 'away' => 'Denmark', 'month' => 6, 'day' => 16, 'hour' => 19],
            ['home' => 'Serbia', 'away' => 'England', 'month' => 6, 'day' => 16, 'hour' => 19],
        ];

        $uid = 100;

        foreach ($fixtures as $fixture) {
            Game::create([
                'uid' => $uid++,
                'home_team_id' => Team::where('name', '=', $fixture['home'])->first()->id,
                'away_team_id' => Team::where('name', '=', $fixture['away'])->first()->id,
                'home_goals' => 0,
                'away_goals' => 0,
                'state' => 'Not started',
                'start_time' => Carbon::create(
                    $year,
                    $fixture['month'],
                    $fixture['day'],
                    $fixture['hour'],
                    0,
                    0,
                    'Europe/Berlin'
                ),
            ]);
        }
    }
}
