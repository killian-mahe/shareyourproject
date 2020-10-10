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

<body class="body-bg">
    <div id="app">
        {{-- NavBar --}}
        <nav class="w-full shadow bg-cultured-100 nav-bar hidden lg:flex z-50">
            <div class="flex justify-around w-full ">
              <a href="{{route('home')}}"><img class="m-2 " src="{{asset('vendor/courier/logos/png/fit/Logo_viridiant_fit.png')}}" width="90px" height="90px"></a>
              <ul class="my-auto hidden lg:flex">
                <li class="nav-bar-li"><a class="inline-flex">Services</a></li>
                <li class="nav-bar-li"><a class="inline-flex">Project</a></li>
                <li class="nav-bar-li"><a class="inline-flex">About</a></li>
                <li class="nav-bar-li"><a class="inline-flex">Account</a></li>
              </ul>
              <search-bar></search-bar>

              @auth
              @else

                <div class="my-auto hidden lg:block">
                    <a href="{{ route("register") }}" class="btn-classic mr-5">Sign Up</a>
                    <a href="{{ route("login") }}" class="btn btn-viridiant hover:text-cultured-100">Log In</a>
                </div>

              @endauth

            </div>
        </nav>
        <nav class="w-full px-2 shadow-lg bg-cultured-100 nav-bar flex lg:hidden">
            <div class="flex justify-around w-full ">
              <a href="{{route('home')}}"><img class="my-2" src="{{asset('vendor/courier/logos/png/fit/Logo_viridiant_fit.png')}}" width="80px" height="80px"></a>
              <div class="my-auto w-1/2">
                <form role="search" class="w-full justify-center flex">
                    <div class="w-40 sm:w-56 md:w-full flex justify-center relative items-center">
                      <i class="search-glass" data-feather="search"></i></button>
                      <input class="search-input placeholder-onyx-300" autocomplete="off" id="search-submit" type="text" placeholder="Search">
                    </div>
                </form>
              </div>
              <!-- Burger Menu -->
              <div class="burger-menu my-auto flex lg:hidden">
                <div class="icon" onclick="myFunction(this)">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
              </div>
            </div>
            <!-- ul li -->
            {{-- <ul class="my-auto lg:hidden mobile-nav-list">
                <li class="m-8"><a>Services</a></li>
                <li class="m-8"><a>Project</a></li>
                <li class="m-8"><a>About</a></li>
                <li class="m-8"><a>Account</a></li>
                <li class="m-8"><a>Log In</a></li>
                <li class="m-8"><a>Sign Up</a></li>
              </ul> --}}
        </nav>

        <main class="z-1">
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
    function myFunction(h) {
        h.classList.toggle("open");
    }
</script>
</html>
