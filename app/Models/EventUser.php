<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EventUser extends Pivot
{
    public static function booted(): void
    {
        static::creating(function ($record) {
            $record->user_id = 2;
            $record->event_id = 2;
            $record->home_prediction = rand(0, 10);
            $record->away_prediction = rand(0, 10);
            $record->is_available = true;
            $record->prediction_time = Carbon::now();
            $record->is_boosted = false;
        });
    }
}
