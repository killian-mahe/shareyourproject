@extends('project.layout')

@section('main')

    @php
        $i = 0;
    @endphp

        @foreach ($project->members as $member)

            @if (!($i%2))

                <div class="member-card lg:flex md:rounded-lg shadow">
                    <a href="#"><img class="member-card-image lg:h-22 lg:w-22 mx-auto lg:ml-0 lg:mr-6" src="{{$member->profile_picture()}}"></a>
                    <div class="text-center lg:text-left">
                        <a href="#" class="member-card-name">{{$member->full_name()}}</a>
                        <div class="member-card-job">{{$member->title}}</div>
                        <a href="#" class="member-card-email">{{$member->email}}</a>
                    </div>
                </div>

            @else

                <div class="member-card-right lg:flex md:rounded-lg shadow">
                    <div class="text-center lg:text-right">
                        <a href="#" class="member-card-name">{{$member->full_name()}}</a>
                        <div class="member-card-job">{{$member->title}}</div>
                        <a href="#" class="member-card-email">{{$member->email}}</a>
                    </div>
                    <a href="#"><img class="member-card-image lg:h-22 lg:w-22 mx-auto lg:mr-0 lg:ml-6" src="{{$member->profile_picture()}}"></a>
                </div>

            @endif

            @php
                $i += 1;
            @endphp

        @endforeach


@endsection
