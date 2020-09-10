@extends('layouts.app')

@section('content')

<div class="w-full h-auto bg-cultured-400 flex justify-center py-6">
    <div class="h-128 justify-center flex-row hidden sm:block w-1/4 md:w-1/4 lg:w-1/6">
        <div class="block-menu mt-48">
            <a href="{{route('projects.show', ['project'=>$project->id])}}">Publications</a>
            <a href="{{route('projects.members', ['project'=>$project->id])}}">Members</a>
            <a href="{{route('projects.about', ['project'=>$project->id])}}">About</a>
        </div>
    </div>
    <div class="w-full mx-2 sm:mx-5 sm:w-3/5 md:w-2/3 lg:w-1/2 rounded-lg">
        <div class="w-full h-auto mb-6 shadow bg-cultured-100 md:rounded-lg">
            <div class="flex relative justify-center">
                <img class=" md:rounded-t-lg object-cover w-full h-48 shadow" src="https://cdn.pixabay.com/photo/2013/03/06/23/09/color-91059_1280.jpg" alt="test">
                <img class=" border-4 border-cultured-100 shadow-md object-cover w-40 h-40 rounded-full mx-auto sm:left-8 lg:left-16 -bottom-12 absolute" src="https://cdn.pixabay.com/photo/2016/03/27/17/42/man-1283235_960_720.jpg" alt="test">
            </div>
            <div class="text-center md:text-right font-semibold font-sans text-2xl md:mr-1/7 mt-12 md:my-4">{{$project->name}}</div>
            <div class="flex py-2 px-4 justify-between">
                <div>
                    <span class="text-sm">An idea from </span>
                    <a href="#" class="text-sm hover:underline">{{$project->owner->full_name()}}</a>
                </div>
                <div>
                    <span class="text-sm italic">Created on </span>
                    <span href="#" class="text-sm">{{$project->created_at}}</span>
                </div>
            </div>
            <div class="tags w-full h-auto bg-yellow-300"></div>
            <div class="badges w-full h-auto bg-indigo-300"></div>
        </div>

        @yield('main')

    </div>
</div>

@endsection
