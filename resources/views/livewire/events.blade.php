<div>
    <div class="section">
        <h1>Events</h1>
    </div>
    <div class="break"></div>
    <h2>Today: {{ Carbon\Carbon::now() }}</h2>
    <div class="events">
         @foreach ($events as $event)
        <div class="event">
            <h2>
            <span>
                <img src="/storage/{{ $event->homeTeam->flag }}" alt="{{ $event->homeTeam->name }}">
                {{ $event->homeTeam->name }}
            </span>
                vs
                <span>
                {{ $event->awayTeam->name }}
                <img src="/storage/{{ $event->awayTeam->flag }}" alt="{{ $event->awayTeam->name }}">
            </span>
            </h2>
            <div class="event_details">
                <p>{{ $event->start_time }}</p>
                <p>Result: {{ $event->home_goals }} - {{ $event->away_goals }}</p>
                <p>State: {{ $event->state }}</p>
                <p>Category: {{ $event->category }}</p>
            </div>
        </div>
        @endforeach

    </div>

</div>
