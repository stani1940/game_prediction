<?php

namespace App\Livewire;

use App\Models\Team;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Teams extends Component
{
    public string $title = "List of teams - finalists";
    public function render(): View
    {
        $teams = Team::query()->where('is_finalist','=',true)->get();

        return view('livewire.teams')->with([
            'teams' => $teams
        ]);
    }
}
