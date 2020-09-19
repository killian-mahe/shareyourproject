@extends('project.layout')

@section('main')

    <div class="description-card md:rounded-lg">
        <div class="line">
        <div class="flex">
            <span class="title">Description</span>
        </div>
        </div>

        <div class="description">
            {{$project->description}}
        </div>
        </div>
    </div>

@endsection
