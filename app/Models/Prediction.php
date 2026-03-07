<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prediction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
        'home_prediction',
        'away_prediction',
        'points',
        'prediction_time',
        'is_open',
    ];

    protected $casts = [
        'prediction_time' => 'datetime',
        'is_open' => 'boolean',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function evaluateAgainstGame(Game $game): void
    {
        $this->points = $this->calculatePoints($game);
        $this->is_open = false;
        $this->save();
    }

    protected function calculatePoints(Game $game): int
    {
        if (
            $game->home_goals === $this->home_prediction
            && $game->away_goals === $this->away_prediction
        ) {
            return 3;
        }

        if (
            $game->home_goals > $game->away_goals
            && $this->home_prediction > $this->away_prediction
        ) {
            return 1;
        }

        if (
            $game->home_goals < $game->away_goals
            && $this->home_prediction < $this->away_prediction
        ) {
            return 1;
        }

        if (
            $game->home_goals === $game->away_goals
            && $this->home_prediction === $this->away_prediction
        ) {
            return 1;
        }

        return 0;
    }
}
