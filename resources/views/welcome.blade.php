<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="icon" type="image/png" href="/img/lux_logo.png" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/welcome.css') }}">
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Landing</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
        <div class="hidden fixed top-0 left-0 px-6 py-4 sm:block">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <span class="ready_for_more_info">When you are ready...</span>
                <span class="more_info">
                        @auth
                        click on Landing over there --->
                    @else
                        click on Login or Register over there --->

                    @endauth
                        </span>
            </div>
        </div>
    @endif
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="logo flex justify-center pt-8">
            <img class="w-40" src="/img/LuxFinal_logo.jpg" alt="LUX logo">
        </div>
        <div class="backup_links flex justify-center pt-8 sm:justify-start sm:pt-0 md:hidden">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Landing</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
    </div>
</div>
</body>
</html>
