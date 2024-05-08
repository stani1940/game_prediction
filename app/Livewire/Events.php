<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Events extends Component
{
    public function render(): View
    {
        $events = Event::query()
                ->where('state', '!=', 'Finished')
                ->orderBy("start_time")
                ->get();

        return view('livewire.events')->with([
            'events' => $events,
            ]);
    }
}
