@extends('user.layout')

@section('main')

<div class="box p-5">

    <h2 class="category-title">Who am I ?</h2>
    <span class="font-light text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ac eros vitae nisl ultrices laoreet.
        Donec id mi ut arcu iaculis rhoncus eu sollicitudin dolor. Nulla ultricies arcu sed nisi convallis tincidunt.
        Nullam a dui enim. Donec ac est eget mauris gravida maximus. Nulla eu dolor et sem porta ullamcorper.
        Phasellus nec orci vulputate, pretium mi et, fringilla metus. Cras quis placerat felis. </span>
    <span class="font-light text-xs block text-right">Member since {{$user->created_at}}</span>
</div>

@php
    $projects = $user->projects;
    $posts = $user->posts;
@endphp

@if ($projects->count() > 0)
    <h2 class="font-semibold text-xl my-5 ml-3">Projects</h2>

    <project-list :projects_ids='@json($user->projects->pluck('id'))'></project-list>
@endif

@if ($posts->count() > 0)
    <h2 class="font-semibold text-xl my-5 ml-3">Posts</h2>

    @foreach ($user->posts as $post)

        @include('components.post')

    @endforeach
@endif

@endsection
