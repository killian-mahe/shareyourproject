@extends('project.layout')

@section('main')

    <div class="w-auto bg-cultured-100 shadow-md px-3 mb-6 md:rounded-lg">
        <div class="w-full h-auto p-2 border-b-0.0625 border-onyx-100 flex">
        <div class="flex">
            <span class="font-sans text-xl ml-3 my-1">Description</span>
        </div>
        </div>

        <div class="px-8 pb-8 pt-4 text-justify">
            {{$project->description}}
        </div>
    </div>


@endsection
