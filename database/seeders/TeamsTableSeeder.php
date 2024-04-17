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
        foreach (File::glob(public_path('storage/') . 'images/flags/*.png*') as $filename) {

                Team::create(['name' => pathinfo($filename)['filename'],
                    'flag' => 'images/flags/'.pathinfo($filename)['basename'],
                ]);
            }

    }
}
