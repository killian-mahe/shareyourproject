@extends('layouts.app')

@section('content')

<div class="block lg:flex justify-center mt-4 min-h-screen">

    <div class="hidden md:block md:w-auto md:mx-4 lg:w-1/4 xl:w-1/6">
        <div class="box w-full h-auto mb-4 flex lg:flex-col flex-none py-2 p-5 md:mt-4 md:justify-center lg:mt-48 md:space-x-8 lg:space-x-0">
            <a class="py-2 px-6" href="#">Profile</a>
            <a class="py-2 px-6" href="#">Account</a>
            <a class="py-2 px-6" href="#">Notifications</a>
        </div>
    </div>

    <div class="w-auto md:w-auto lg:w-1/2 mx-4">
        @yield('main')
    </div>
    <div class="hidden xl:block lg:w-1/6 xl:w-1/8"></div>

</div>

@endsection
