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

<body class="bg-cultured-400">
    <div id="app" class="flex h-screen">

        <nav class="w-64 h-full bg-onyx-600">
            {{-- Navbar Header --}}
            <div class="w-full bg-onyx-700 h-16 py-2">
                <img class="h-full w-auto mx-auto" src="{{asset('/vendor/courier/logos/svg/text/Logo_cultured_text.svg')}}" alt="logo_text">
            </div>

            @php
                $categories = [
                    [
                        'name' => 'Models',
                        'display' => true,
                        'icon' => 'box',
                        'items' => [
                            [
                                'label' => 'Projects',
                                'link' => route('admin.models.projects'),
                            ],
                            [
                                'label' => 'Posts',
                                'link' => route('admin.models.posts'),
                            ],
                            [
                                'label' => 'Users',
                                'link' => route('admin.models.users'),
                            ],
                            [
                                'label' => 'Tags',
                                'link' => route('admin.models.tags'),
                            ],
                            [
                                'label' => 'Technologies',
                                'link' => route('admin.models.technologies'),
                            ]
                        ]
                    ]
                ];
            @endphp

            {{-- Navbar Links --}}
            <admin-navbar :links='@json($categories)'></admin-navbar>
        </nav>

        <main class="flex-grow flex flex-col">
            <header class="h-16 bg-white shadow-md pl-10 pr-6 flex items-center justify-between">
                {{-- Section Title --}}
                <span class="font-semibold text-xl flex my-3 items-center">
                    @yield('section-title')
                </span>

                {{-- Account section --}}
                <div class="flex items-center hover:bg-gray-200 h-full px-3">
                <a href="{{route('users.show', ['user' => Auth::user()->id])}}"><img class="h-10 w-10 rounded-full mr-3" src="{{Auth::user()->profile_picture()}}" alt="profile_picture"></a>
                    <div class="flex flex-col">
                        <span class="text-gray-700 font-medium">{{Auth::user()->fullname}}</span>
                        <span class="text-gray-700 text-sm">{{Auth::user()->title}}</span>
                    </div>
                </div>

            </header>
            <section class="grid grid-cols-8 p-4">
                @yield('content')
            </section>
        </main>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>
</html>
