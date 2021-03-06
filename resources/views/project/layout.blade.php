@extends('layouts.app')

@section('content')

<div class="block lg:flex justify-center mt-4 min-h-screen">

    <div class="block w-auto md:mx-4 lg:w-1/4 xl:w-1/6">
        <div class="box w-full h-auto mb-4 flex lg:flex-col flex-none py-2 p-5 md:mt-4 justify-center lg:mt-48 md:space-x-8 lg:space-x-0">
            <a class="py-2 px-6" href="{{route('projects.show', ['project'=>$project->id])}}">Publications</a>
            <a class="py-2 px-6" href="{{route('projects.members', ['project'=>$project->id])}}">Members</a>
            <a class="py-2 px-6" href="{{route('projects.about', ['project'=>$project->id])}}">About</a>
        </div>
    </div>

    <div class="w-auto md:w-auto lg:w-2/3 md:mx-4">

        <div class="box w-full h-auto mb-6">
            <div class="flex relative justify-center">
                <img class=" md:rounded-t-md object-cover w-full h-48 shadow" src="{{ $project->banner_picture() }}" alt="test">
                <img class=" border-4 border-cultured-100 shadow-md object-cover w-40 h-40 rounded-full mx-auto sm:left-8 lg:left-16 -bottom-12 absolute" src="{{ $project->profile_picture() }}" alt="test">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 mt-14 mx-4 pb-4">
                <div class="text-center md:text-left font-semibold font-sans text-2xl">{{$project->name}}</div>
                <span class="flex justify-center md:justify-end">
                    <follow-button :project_id='{{$project->id}}' @auth :auth_user='@json(new \App\Http\Resources\User(Auth::user()))' @endauth></follow-button>
                </span>
                <div class="flex md:justify-start justify-center">
                    <span class="text-sm">An idea from </span>
                    <a href="{{route('users.show', ['user'=>$project->owner_id])}}" class="text-sm hover:underline">{{$project->owner->full_name()}}</a>
                </div>
                <div class="flex md:justify-end justify-center">
                    <span class="text-sm italic">Created on </span>
                    <span href="#" class="text-sm">{{$project->created_at}}</span>
                </div>
            </div>



            {{-- Follow Button --}}


            {{-- Adding Tags and Badges --}}
            <div class="tags w-full h-auto bg-yellow-300"></div>
            <div class="badges w-full h-auto bg-indigo-300"></div>
            {{--  --}}
        </div>

        @yield('main')

    </div>
    <div class="hidden xl:block lg:w-1/6 xl:w-1/8"></div>

</div>

@endsection
