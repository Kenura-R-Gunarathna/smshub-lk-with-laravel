<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SMSHub.LK - @yield('title')</title>

    @livewireStyles
    
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

    <nav>
        @yield('header')
    </nav>

    <div class="w-full bg-gray-50">
        <div class="mx-auto max-w-screen-xl">
            @yield('content')
        </div>
    </div>


    <footer>
        @yield('footer')
    </footer>

    @livewireScripts
</body>
</html>