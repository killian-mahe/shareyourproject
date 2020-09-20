@extends('project.layout')

@section('main')

        @foreach ($project->posts as $post)

            @include('components.post')

        @endforeach

@endsection
