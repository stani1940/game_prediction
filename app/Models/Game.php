<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Game extends Model
{
    use HasFactory;
    protected $table = 'events';

    protected $fillable = [
        'uid',
        'title',
        'home_team_id',
        'away_team_id',
        'home_goals',
        'away_goals',
        'state',
        'start_time',
    ];

    protected $casts = [
        'start_time' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (Game $game) {
            $game->ensureTitle();
        });

        static::saved(function (Game $game) {
            $game->refreshPredictionPoints();
        });
    }

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function predictions(): HasMany
    {
        return $this->hasMany(Prediction::class, 'game_id');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('state', '!=', 'Finished')->orderBy('start_time');
    }

    public function scopeFinished($query)
    {
        return $query->where('state', 'Finished')->orderByDesc('start_time');
    }

    public function refreshPredictionPoints(): void
    {
        if ($this->state !== 'Finished') {
            return;
        }

        $this->predictions->each(function (Prediction $prediction) {
            $prediction->evaluateAgainstGame($this);
        });
    }

    protected function ensureTitle(): void
    {
        if (filled($this->title)) {
            return;
        }

        $home = $this->homeTeam?->name ?? 'home';
        $away = $this->awayTeam?->name ?? 'away';
        $identifier = $this->uid ?? $this->id ?? Str::random(5);

        $this->title = Str::slug("{$home}-{$away}-{$identifier}");
    }
}
