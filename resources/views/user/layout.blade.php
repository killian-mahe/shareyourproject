@extends('layouts.app')

@section('content')

<div class="flex justify-center mt-4 min-h-screen">

    <div class="hidden md:block md:w-1/3 md:ml-4 lg:w-1/4 xl:w-1/6">
        <div class="block-menu p-5 mt-48">
            <h2 class="category-title">Links</h2>
            <div class="flex justify-between py-2"><span class="text-linkedin">LinkedIn</span><a href="https://www.linkedin.com/in/killian-mah%C3%A9-246928135/">killian-mahe</a></div>
            <div class="flex justify-between py-2"><span class="text-github">GitHub</span><a href="https://github.com/killian-mahe">@killian-mahe</a></div>
        </div>
    </div>

    <div class="w-full md:w-2/3 lg:w-1/2 mx-4">

        <div class="w-full h-auto mb-3 pb-4 shadow bg-cultured-100 md:rounded-lg">
            <div class="flex relative justify-center">
                <img class="md:rounded-t-lg object-cover w-full h-48" src="https://cdn.pixabay.com/photo/2013/03/06/23/09/color-91059_1280.jpg" alt="test">
                <img class=" border-4 border-cultured-100 shadow-md object-cover w-40 h-40 rounded-full mx-auto sm:left-8 lg:left-16 -bottom-12 absolute" src="https://cdn.pixabay.com/photo/2016/03/27/17/42/man-1283235_960_720.jpg" alt="test">
            </div>
            <div class="text-center md:text-right font-semibold font-sans text-2xl md:mr-1/7 mt-12 md:my-4">{{$user->first_name}} {{$user->last_name}}</div>
        </div>

        @yield('main')

    </div>
    <div class="hidden xl:block lg:w-1/6 xl:w-1/8"></div>

</div>

@endsection
