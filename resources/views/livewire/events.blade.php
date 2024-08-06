<x-guest-layout>
<div>
    <div class="section">
        <h1>Events</h1>
    </div>
    <div class="break"></div>
    <h2>Today: {{ Carbon\Carbon::now() }}</h2>

    <div class="events">

        @foreach ($events as $event)
            <div class="CardMatch1" style="width: 765px; height: 183px; position: relative">
                <div class="Rectangle9" style="width: 765px; height: 183px; left: 0px; top: 0px; position: absolute; background: rgb(234 225 225); border-radius: 16px"></div>
                <div class="Rectangle58" style="width: 112.71px; height: 183px; left: 0px; top: 0px; position: absolute; background: white; border-top-left-radius: 16px; border-top-right-radius: 16px"></div>
                <div style="width: 71.94px; height: 48.44px; left: 21.58px; top: 67.28px; position: absolute; color: #8A1538; font-size: 14px; font-family: IBM Plex Sans; font-weight: 600; word-wrap: break-word">تمت</div>
                <div class="Group3136" style="width: 294.97px; height: 96.88px; left: 263.79px; top: 48.44px; position: absolute">
                    <div style="width: 59.95px; height: 48.44px; left: 235.02px; top: 0px; position: absolute; color: white; font-size: 14px; font-family: IBM Plex Sans; font-weight: 600; word-wrap: break-word">قطر </div>
                    <div style="width: 122.30px; height: 48.44px; left: 0px; top: 0px; position: absolute; color: white; font-size: 14px; font-family: IBM Plex Sans; font-weight: 600; word-wrap: break-word">الإكوادور</div>
                    <div class="Vs" style="width: 35.97px; height: 48.44px; left: 141.49px; top: 0px; position: absolute; color: white; font-size: 14px; font-family: IBM Plex Sans; font-weight: 600; word-wrap: break-word">vs</div>
                    <div style="width: 21.58px; height: 48.44px; left: 57.55px; top: 48.44px; position: absolute; color: white; font-size: 14px; font-family: IBM Plex Sans; font-weight: 600; word-wrap: break-word">0</div>
                    <div style="width: 6px; height: 44.21px; left: 63px; top: 44.21px; position: absolute; color: white; font-size: 14px; font-family: Airbnb Cereal App; font-weight: 500; word-wrap: break-word">-</div>
                    <div style="width: 21.58px; height: 48.44px; left: 256.60px; top: 48.44px; position: absolute; color: white; font-size: 14px; font-family: IBM Plex Sans; font-weight: 600; word-wrap: break-word">1</div>
                </div>
                <div class="Group3098" style="width: 541.97px; height: 59.21px; left: 167.87px; top: 56.51px; position: absolute">
                    <div class="Ecuador" style="width: 52.76px; height: 59.21px; left: 0px; top: 0px; position: absolute">
                        <div class="Vector" style="width: 52.76px; height: 32.18px; left: 0px; top: 0px; position: absolute; background: #FFDA44"></div>
                        <div class="Vector" style="width: 45.70px; height: 16.73px; left: 3.53px; top: 42.47px; position: absolute; background: #D80027"></div>
                        <div class="Vector" style="width: 52.76px; height: 14.80px; left: 0px; top: 29.60px; position: absolute; background: #0052B4"></div>
                        <div class="Vector" style="width: 18.35px; height: 20.59px; left: 17.20px; top: 19.31px; position: absolute; background: #FFDA44"></div>
                        <div class="Vector" style="width: 11.47px; height: 16.73px; left: 20.64px; top: 19.31px; position: absolute; background: #338AF3"></div>
                        <div class="Vector" style="width: 18.35px; height: 10.30px; left: 17.20px; top: 11.58px; position: absolute; background: black"></div>
                    </div>
                    <div class="Qatar" style="width: 52.76px; height: 59.21px; left: 489.22px; top: 0px; position: absolute">
                        <div class="Vector" style="width: 52.76px; height: 59.21px; left: 0px; top: 0px; position: absolute; background: #F0F0F0"></div>
                        <div class="Vector" style="width: 42.44px; height: 59.21px; left: 10.32px; top: 0px; position: absolute; background: #751A46"></div>
                    </div>
                </div>
            </div>
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

</x-guest-layout>
