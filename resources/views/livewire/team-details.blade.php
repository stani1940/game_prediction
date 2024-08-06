<div class="section">
    <h2>Team`s details</h2>
</div>
<div class="break"></div>
<div class="teams">
    @forelse ($events as $event)
    <div>
        <div class="timedate">
            <div class="event_date">{{ $event->start_time }}</div>

        </div>

        <div class="home">
            <img src="/stprage/{{ $event->homeTeam->flag }}" class="flag" alt="home_pic">
            <span>{{ $event->home_team }}</span>
        </div>

        <div class=result>
            <span>{{ $event->home_goals }}</span>
            <span>-</span>
            <span>{{ $event->away_goals }}</span>

            <div class="away">
                <img src="/static/{{ $event->away_team->flag }}" class="flag" alt="away_pic">
                <span>{{ $event->away_team }}</span>
            </div>
        </div>
        <hr>
    </div>
        @empty
            <p>There aren't any events with {{$team->name}}</p>

    @endforelse
</div>
