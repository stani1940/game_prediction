<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        User::create([
                'name' => 'Stanislav Ginev',
                'email' => 'stanislav1940@abv.bg',
                'email_verified_at' => now(),
                'password' => '12345678',
                'role_id' => $adminRole->id,
                'remember_token' => Str::random(10),
                'username' => 'stani1940',
                'boosts_left' => 2,
                'being_notified' => true,
        ]);
    }
}
