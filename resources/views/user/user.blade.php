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

<h2 class="font-semibold text-xl my-5 ml-3">Projects</h2>

@foreach ($user->projects as $project)

    @include('components.cards.project')

@endforeach

<h2 class="font-semibold text-xl my-5 ml-3">Posts</h2>

@foreach ($user->posts as $post)

    @include('components.post')

@endforeach

@endsection
