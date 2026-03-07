<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uid' => $this->faker->unique()->numberBetween(1, 10000),
            'home_team_id' => Team::factory(),
            'away_team_id' => Team::factory(),
            'home_goals' => 0,
            'away_goals' => 0,
            'state' => 'Not started',
            'start_time' => $this->faker->dateTimeBetween('+1 day', '+1 month'),
        ];
    }
}

