<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Teams extends Component
{
    public string $title = "List of teams - finalists";
    public object|null $team = null;
    public function render(): View
    {
        $teams = Team::query()->where('is_finalist','=',true)->get();

        return view('livewire.teams')->with([
            'teams' => $teams
        ]);
    }

    public function mount($name)
    {
        $this->team = Team::find($name);
    }
    public function team_details($name): View
    {
        $this->team = Team::all()->where('name',$name)->first();

        $events = Event::where(function ($query) {
            $query->where('home_team_id', '=', $this->team->id)
                ->orWhere('away_team_id', '=', $this->team->id);
        })->where(function ($query) {
            $query->where('state', '=', 'Finished');
        });

        return view("livewire/team-details")->with([
            'events' => $events,
            'team' => $this->team,
        ]);
    }
}
