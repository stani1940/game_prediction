<?php

namespace Database\Seeders;

use App\Models\Event;
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

       Event::create([
           'home_team_id' => Team::where('name','=','Germany')->first()->id,
           'away_team_id' => Team::where('name','=','Scotland')->first()->id,
           'start_time' => Carbon::create($year, 06, 14, 21, 00, 00,'Europe/Berlin')
       ]);

        Event::create([
            'home_team_id' => Team::where('name','=','Hungary')->first()->id,
            'away_team_id' => Team::where('name','=','Switzerland')->first()->id,
            'start_time' => Carbon::create($year, 06, 15, 19, 00, 00,'Europe/Berlin')
        ]);
    }
}
