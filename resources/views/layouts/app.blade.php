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
        {{-- <nav class="w-full flex shadow-lg bg-cultured-100 nav-bar">
            <div class="flex justify-around w-full ">
              <a><img class="my-2 " src="{{asset('vendor/courier/logos/png/fit/Logo_viridiant_fit.png')}}" width="100px" height="100px"></a>
              <ul class="my-auto flex">
                <li><a class="inline-flex">Services</a></li>
                <li><a class="inline-flex">Project</a></li>
                <li><a class="inline-flex">About</a></li>
                <li><a class="inline-flex">Account</a></li>
              </ul>
              <div class="my-auto w-1/4">
                <form role="search" class="w-full justify-center">
                  <div class="flex justify-center">
                    <input class="search-box" id="search-submit" type="text" placeholder="Search ...">
                    <button class="search-glass"><a><img src="{{asset('vendor/courier/icons/search.svg')}}" width="24px" height="24px"></a></button>
                </div>
                </form>
              </div>
              <div class="my-auto">
                <button class="btn btn-viridiant-outline">Sign Up</button>
                <button class="btn btn-viridiant">Log In</button>
              </div>
            </div>
        </nav>--}}
        <nav class="w-full flex shadow-lg bg-cultured-100 nav-bar">
            <div class="flex justify-around w-full ">
              <a><img class="my-2 " src="{{asset('vendor/courier/logos/png/fit/Logo_viridiant_fit.png')}}" width="80px" height="80px"></a>
              <ul class="my-auto hidden lg:flex">
                <li><a class="inline-flex">Services</a></li>
                <li><a class="inline-flex">Project</a></li>
                <li><a class="inline-flex">About</a></li>
                <li><a class="inline-flex">Account</a></li>
              </ul>
              <div class="my-auto w-1/2">
                <form role="search" class="w-full justify-center">
                  <div class="flex justify-center">
                    <input class="search-box" id="search-submit" type="text" placeholder="Search ...">
                    <button class="search-glass"><a><img src="{{asset('vendor/courier/icons/search.svg')}}" width="24px" height="24px"></a></button>
                	</div>
                </form>
              </div>
              <div class="my-auto hidden lg:block">
                <button class="btn btn-viridiant-outline">Sign Up</button>
                <button class="btn btn-viridiant">Log In</button>
              </div>
              <div class="my-auto flex lg:hidden">
                <div class="my-auto menu-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            	</div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
