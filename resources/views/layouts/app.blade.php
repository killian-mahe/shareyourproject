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
        <nav class="w-full shadow-lg bg-cultured-100 nav-bar hidden lg:flex">
            <div class="flex justify-around w-full ">
              <a><img class="my-2 " src="{{asset('vendor/courier/logos/png/fit/Logo_viridiant_fit.png')}}" width="80px" height="80px"></a>
              <ul class="my-auto hidden lg:flex">
                <li class="nav-bar-li"><a class="inline-flex">Services</a></li>
                <li class="nav-bar-li"><a class="inline-flex">Project</a></li>
                <li class="nav-bar-li"><a class="inline-flex">About</a></li>
                <li class="nav-bar-li"><a class="inline-flex">Account</a></li>
              </ul>
              <div class="my-auto w-1/4">
                <form role="search" class="w-full justify-center">
                  <div class="flex justify-center">
                    <input class="search-input w-56" autocomplete="off" id="search-submit" type="text" placeholder="Search ...">
                    <button class="search-glass"><span class="text-cultured-100"><img src="{{asset('vendor/courier/icons/search.svg')}}" width="24px" height="24px"></span></button>
                	</div>
                </form>
              </div>
              <div class="my-auto hidden lg:block">
                <button class="btn btn-viridiant-outline">Sign Up</button>
                <button class="btn btn-viridiant">Log In</button>
              </div>
            </div>
        </nav>
        <nav class="w-full px-2 shadow-lg bg-cultured-100 nav-bar flex lg:hidden">
            <div class="flex justify-around w-full ">
              <a><img class="my-2" src="{{asset('vendor/courier/logos/png/fit/Logo_viridiant_fit.png')}}" width="80px" height="80px"></a>
              <div class="my-auto w-1/2">
                <form role="search" class="w-full justify-center">
                  <div class="flex justify-center">
                    <input class="search-input w-32 md:w-64" autocomplete="off" id="search-submit" type="text" placeholder="Search ...">
                    <button class="search-glass"><span class="text-cultured-100"><img src="{{asset('vendor/courier/icons/search.svg')}}" width="24px" height="24px"></span></button>
                	</div>
                </form>
              </div>
              <!-- Burger Menu -->
              <div class="my-auto flex lg:hidden">
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
        </nav>
        <!-- ul li -->
        <ul class="my-auto lg:hidden mobile-nav-list">
            <li class="m-8"><a>Services</a></li>
            <li class="m-8"><a>Project</a></li>
            <li class="m-8"><a>About</a></li>
            <li class="m-8"><a>Account</a></li>
            <li class="m-8"><a>Log In</a></li>
            <li class="m-8"><a>Sign Up</a></li>
          </ul>
        <main>
            @yield('content')
        </main>
        {{-- Real-Time Chat --}}
        <div class="chat-window mx-4">
            <div class="chat-header">
                <button class="px-4"><img src="{{asset('vendor/courier/icons/user.svg')}}" width="20px" height="20px"></button>
                <div class="my-auto flex text-cultured-100" for="">Unknow person</div>
                <button class="my-auto ml-auto mr-2"><img class="text-cultured-100" src="{{asset('vendor/courier/icons/minus.svg')}}" width="20px" height="20px"></button>
                <button class="my-auto mr-2"><img class="text-cultured-100" src="{{asset('vendor/courier/icons/x.svg')}}" width="20px" height="20px"></button>
            </div>
            <div class="chat-container"></div>
            <div class="chat-footer">
                <div class="w-full h-full flex my-auto">
                    <input class="chat-input" autocomplete="off" id="message-submit" type="text" placeholder="Type your message...">
                    <button class="smiley my-auto"><img class="text-cultured-100" src="{{asset('vendor/courier/icons/smile.svg')}}" width="24px" height="24px"></button>
                    <button class="send my-auto"><img class="text-cultured-100" src="{{asset('vendor/courier/icons/send.svg')}}" width="18px" height="18px"></button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script>
    function myFunction(h) {
        h.classList.toggle("open");
    }
</script>
</html>
