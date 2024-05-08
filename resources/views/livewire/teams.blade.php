<div>
    <h1>
        TEAMS FINALIST LIST EURO 2024
    </h1>
</div>

<div>
    @foreach ($teams as $team)
        <div wire:key="{{ $team->id }}">
            <div>
                {{$team->name}}
            </div>
            <div>
                <img src="/storage/{{$team->flag}}" alt="team-flag">
            </div>
        </div>
    @endforeach
</div>
