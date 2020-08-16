<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{-- NavBar --}}
        <nav class="w-screen flex shadow-lg bg-cultured-100 nav-bar">
            <div class="flex justify-around w-full ">
              <a><img class="my-2 " src="{{asset('vendor/courier/logos/png/fit/Logo_viridiant_fit.png')}}" width="100px" height="100px"></a>
              <ul class="my-auto flex">
                <li><a class="inline-flex">Services</a></li>
                <li><a class="inline-flex">Project</a></li>
                <li><a class="inline-flex">About</a></li>
                <li><a class="inline-flex">Account</a></li>
              </ul>
              <div class="my-auto w-1/4">
                <form role="search" class="w-full flex justify-center">
                  <input class="search-bar" id="search-submit" type="text" placeholder="Search ...">
                </form>
              </div>
              <div class="my-auto">
                <button class="btn btn-viridiant-outline">Sign Up</button>
                <button class="btn btn-viridiant">Log In</button>
              </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
