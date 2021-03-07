@extends('project.layout')

@section('main')

        @foreach ($project->posts()->orderByDesc('created_at')->get() as $post)

            @include('components.post')

        @endforeach

@endsection
