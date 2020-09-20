@extends('user.layout')

@section('main')

<div class="bg-cultured-100 shadow md:rounded-lg p-5">

    <h2 class="category-title">Who he is ?</h2>
    <span class="font-light text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ac eros vitae nisl ultrices laoreet.
        Donec id mi ut arcu iaculis rhoncus eu sollicitudin dolor. Nulla ultricies arcu sed nisi convallis tincidunt.
        Nullam a dui enim. Donec ac est eget mauris gravida maximus. Nulla eu dolor et sem porta ullamcorper.
        Phasellus nec orci vulputate, pretium mi et, fringilla metus. Cras quis placerat felis. </span>
    <span class="font-light text-xs block text-right">Member since {{$user->created_at}}</span>
</div>

<h2 class="category-title my-2">Projects</h2>

@foreach ($user->projects as $project)

<div class="bg-cultured-100 shadow md:rounded-lg flex mb-3 border-b-8 border-viridiant-600">
    <img class="w-1/5 md:rounded-tl-md object-cover" src="{{asset('vendor/courier/img/jeff-sheldon-8z2Q6XWLYa4.jpg')}}" alt="project_picture">
    <div class="p-3">
        <h3 class="font-semibold mb-4">{{$project->name}}</h3>
        <p class="font-light text-sm">{{$project->description}}</p>
        <div class="mt-4 mb-2">
            @foreach ($project->technologies as $technology)
                <badge-label label="{{$technology->label}}" link="#"></badge-label>
            @endforeach
        </div>
        <div class="w-full flex justify-end items-center">
            <span class="relative w-24 h-7">
                @foreach ($project->members->slice(0, 1) as $member)
                    <img class="h-7 w-7 rounded-full absolute right-4" src="{{$member->profile_picture()}}" alt="">
                @endforeach

                @foreach ($project->members->slice(1, 1) as $member)
                    <img class="h-7 w-7 rounded-full absolute right-0" src="{{$member->profile_picture()}}" alt="">
                @endforeach
            </span>
            <span class="text-sm font-light ml-2">{{$project->members->count()}} members</span>
        </div>
    </div>
</div>

@endforeach

@endsection
