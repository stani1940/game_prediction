<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = ['Germany', 'Belgium', 'France', 'Portugal',
'Scotland', 'Spain', 'Turkiye', 'Austria', 'England', 'Hungary',
'Slovakia', 'Albania', 'Czechia', 'Denmark', 'Netherlands',
'Romania', 'Switzerland', 'Slovenia', 'Serbia', 'Croatia', 'Italy',
        ];

        foreach (File::glob(public_path() . '/images/flags/*.png*') as $filename) {

                Team::create(['name' => pathinfo($filename)['filename'],
                    'flag' => $filename,
                ]);
            }

    }
}
