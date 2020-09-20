@extends('project.layout')

@section('main')

    @php
        $i = 0;
    @endphp

        @foreach ($project->members as $member)

            @include('components.cards.member', ['right' => ($i%2)])

            @php
                $i += 1;
            @endphp

        @endforeach


@endsection
