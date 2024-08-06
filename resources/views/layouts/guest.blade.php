<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
        <link href="https://fonts.cdnfonts.com/css/digital-numbers" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script type="text/javascript" src="{{asset('js/script.js') }}"></script>
    </head>
    <body>
    <section id="hero">
        <header class="header">
            <div class="container">
                <nav class="navigation">
                    <a href="index.html" class="logo">
                        <img src="/storage/images/logo.svg" alt="Logo" class="logo-img" />
                    </a>
                    <div class="mobile-menu-icon">
                        <ion-icon name="menu-outline" class="menu_icon"></ion-icon>
                    </div>
                    <ul class="nav_menu">
                        <li class="nav_list">
                            <a href="/events" class="nav_link active">Events</a>
                        </li>
                        <li class="nav_list">
                            <a href="/users/scoreboard" class="nav_link">Scoreboard</a>
                        </li>

                        <li class="nav_list">
                            <a href="/results" class="nav_link">Results</a></li>
                        </li>
                        <li class="nav_list">
                            <a href="/rules" class="nav_link">Rules</a>
                        </li>
                        @auth

                        <li class="nav_list"><a href="/users/signout" class="nav_link">SignOut</a></li>
                        <li class="nav_list"><a href="" class="nav_link">Profile</a></li>
                        @else
                            @if (Route::has('register'))

                        <li class="nav_list">
                            <a href="/register" class="nav_link">SignUp</a>
                        </li>
                            @endif
                        <li class="nav_list btn-nav">
                            <a href="/login" class="btn-outline">
                                <span>SignIn</span>
                                <ion-icon name="compass-outline"></ion-icon>
                            </a>
                        </li>

                        @endauth

                    </ul>
                </nav>
            </div>
        </header>
        <div class="hero-main-container">
            <div class="container">
                <div class="hero-container">
                    <div class="hero-content">
                        <h1 class="section-heading">
                            Our football dream <br /> start here!
                        </h1>
                        <p class="paragraph">
                            Come for Europian Cup matches & enjoy!.
                        </p>

                        <div class="cup-count-down">
                            <div class="count">
                                <h3 class="days">00</h3>
                                <span class="count-time">days</span>
                            </div>
                            <div class="count">
                                <h3 class="hours">00</h3>
                                <span class="count-time">hours</span>
                            </div>
                            <div class="count">
                                <h3 class="minutes">00</h3>
                                <span class="count-time">minutes</span>
                            </div>
                            <div class="count">
                                <h3 class="seconds">00</h3>
                                <span class="count-time">seconds</span>
                            </div>
                        </div>

                    </div>
                    <div class="hero-image">
                        <img src="/storage/images/maskot.webp" alt="hero-img" class="hero-img" />
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">


            <div class="w-full">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
