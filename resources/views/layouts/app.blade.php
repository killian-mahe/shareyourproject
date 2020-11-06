<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- App Logo Page -->
    <link rel="icon" type="image/png" href="{{asset('vendor/courier/logos/png/ico/Logo_viridiant_ico.png')}}" />

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

<body class="bg-cultured-600">
    <div id="app">
        {{-- Laptop NavBar --}}
        <nav class="w-full shadow bg-cultured-100 nav-bar hidden lg:flex z-50 fixed h-16">
            <div class="flex justify-around w-full ">
              <a href="{{route('home')}}"><img class="m-2 " src="{{asset('vendor/courier/logos/svg/fit/Logo_viridiant_fit.svg')}}" width="90px" height="90px"></a>
              <ul class="my-auto hidden lg:flex">
                <li class="nav-bar-li"><a class="inline-flex" href="{{route('home')}}"><i data-feather="home" class="mr-1"></i>@auth My feed @else Feed @endauth</a></li>
                @auth
                    <li class="nav-bar-li"><a class="inline-flex" href="#"><i data-feather="layout" class="mr-1"></i>My dashboard</a></li>
                    <li class="nav-bar-li"><a class="inline-flex" href="#"><i data-feather="message-circle" class="mr-1"></i>My message</a></li>
                @endauth
                <li class="nav-bar-li"><a class="inline-flex" href="#"><i data-feather="compass" class="mr-1"></i>Explore</a></li>
              </ul>
              <search-bar class="w-1/4"></search-bar>

            @auth

            <div class="my-auto hidden lg:block">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-classic mr-5 a-none">Log out</button>
                </form>
            </div>

            @else

            <div class="my-auto hidden lg:block">
                <a href="{{ route("register") }}" class="btn-classic mr-5 a-none">Sign Up</a>
                <a href="{{ route("login") }}" class="btn btn-viridiant hover:text-cultured-100 a-none">Log In</a>
            </div>

            @endauth

            </div>
        </nav>

        {{-- Tablet Nav-Bar --}}
        <tablet-nav-bar class="hidden sm:block lg:hidden" home_link="{{route('home')}}" logo_text="{{asset('vendor/courier/logos/svg/text/Logo_viridiant_text.svg')}}" logo_simple="{{asset('vendor/courier/logos/svg/simple/Logo_viridiant_simple.svg')}}" @auth :auth_user='@json(new \App\Http\Resources\User(Auth::user()))' @endauth></tablet-nav-bar>

        {{-- Mobile Nav-Bar --}}
        <mobile-nav-bar class="block sm:hidden" home_link="{{route('home')}}" logo_simple="{{asset('vendor/courier/logos/svg/simple/Logo_viridiant_simple.svg')}}" @auth :auth_user='@json(new \App\Http\Resources\User(Auth::user()))' @endauth></mobile-nav-bar>


        <main class="sm:ml-16 lg:ml-0 lg:pt-16">

            @yield('content')
        </main>
        {{-- Real-Time Chat --}}
        {{-- <div class="chat-window mx-4">
            <div class="chat-header">
                <button class="px-4"><i class="text-cultured-100 w-5" data-feather="user"></i></button>
                <div class="my-auto flex text-cultured-100">Unknow person</div>
                <button class="my-auto ml-auto mr-2"><i class="text-cultured-100 w-5" data-feather="minus"></i></button>
                <button class="my-auto mr-2"><i class="text-cultured-100 w-5" data-feather="x"></i></button>
            </div>
            <div class="chat-container"></div>
            <div class="chat-footer">
                <div class="w-full h-full flex my-auto">
                    <input class="chat-input" autocomplete="off" id="message-submit" type="text" placeholder="Type your message...">
                    <button class="btn-smiley my-auto"><i class="text-cultured-100 w-5" data-feather="smile"></i></button>
                    <button class="btn-send my-auto"><i class="text-cultured-100 w-4 transform -translate-x-0.25 translate-y-0.25" data-feather="send"></i></button>
                </div>
            </div>
        </div> --}}
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>
</html>
