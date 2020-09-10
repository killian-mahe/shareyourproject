@extends('layouts.app')

@section('content')

<div class="flex justify-center mt-4">

    <div class="w-2/5">

        <div class="w-full h-auto mb-6 pb-4 shadow bg-cultured-100 md:rounded-lg">
            <div class="flex relative justify-center">
                <img class="md:rounded-t-lg object-cover w-full h-48" src="https://cdn.pixabay.com/photo/2013/03/06/23/09/color-91059_1280.jpg" alt="test">
                <img class=" border-4 border-cultured-100 shadow-md object-cover w-40 h-40 rounded-full mx-auto sm:left-8 lg:left-16 -bottom-12 absolute" src="https://cdn.pixabay.com/photo/2016/03/27/17/42/man-1283235_960_720.jpg" alt="test">
            </div>
            <div class="text-center md:text-right font-semibold font-sans text-2xl md:mr-1/7 mt-12 md:my-4">{{$user->first_name}} {{$user->last_name}}</div>
        </div>

        @yield('main')

    </div>

</div>

@endsection
