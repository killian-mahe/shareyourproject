@extends('layouts.app')

@section('content')

<div class="block lg:flex justify-center mt-4 min-h-screen">

    <div class="block w-auto md:mx-4 lg:w-1/4 xl:w-1/6">
        <div class="box w-full h-auto mb-4 flex lg:flex-col flex-none py-2 p-5 md:mt-4 justify-center lg:mt-48 md:space-x-8 lg:space-x-0">
            <a class="py-2 px-6 {{Route::is('users.settings.profile') ? 'active' : ''}}" href="{{route('users.settings.profile', ['user' => $user])}}">Profile</a>
            <a class="py-2 px-6 {{Route::is('users.settings.account') ? 'active' : ''}}" href="{{route('users.settings.account', ['user' => $user])}}">Account</a>
            <a class="py-2 px-6 {{Route::is('users.settings.notif') ? 'active' : ''}}" href="{{route('users.settings.notif', ['user' => $user])}}">Notifications</a>
        </div>
    </div>

    <div class="w-auto md:w-auto lg:w-2/3 md:mx-4">
        @yield('main')
    </div>
    <div class="hidden xl:block lg:w-1/6 xl:w-1/8"></div>

</div>

@endsection
