@extends('layouts.app')


@section('content')

<div class="flex justify-center mt-4 min-h-screen">

    <div class="hidden xl:block lg:w-1/6 xl:w-1/8">
        {{-- Side Left Block --}}
    </div>

    <div class="w-full md:w-2/3 lg:w-1/2 mx-4">
        {{-- Center Block --}}
        <div class="box w-full h-auto mb-6 px-8">
            <h1 class="text-onyx-600 font-sans font-bold text-center text-3xl p-4">Create a new project</h1>
            <hr class="mx-4 mb-6">

            <form action="{{route('projects.store')}}" method="POST">
                @csrf
                <custom-input class="w-full md:w-1/2 mb-4" name="project-name" label="Project name" indication="Great project names are short and memorable." type="text" placeholder="ex : Share Your Project" error=""></custom-input>
                <custom-input class="w-full mb-4" name="description" label="Description" type="text" error=""></custom-input>
                <user-select-input class="w-full mb-4" name="collaborators[]" label="Add a new collaborator" placeholder="ex : John Doe" error=""></user-select-input>

                <badge-select-input class="w-full mb-4" name="badges[]" label="Select your badge(s)" placeholder="ex : Python" error=""></badge-select-input>

                @php
                    $options = [
                        ['text' => 'Ongoing', 'value' => 'ongoing'],
                        ['text' => 'On Break', 'value' => 'onbreak'],
                        ['text' => 'Finished', 'value' => 'finished'],
                        ['text' => 'Abandoned', 'value' => 'abandoned'],
                    ];

                @endphp

                <select-input label="Project status" name="status" :options='@json($options)'>
                    <i class="text-onyx-900 my-auto h-4 w-4 cursor-pointer absolute right-3 transform rotate-90" data-feather="code"></i>
                </select-input>

                <tag-select-input name="tags[]"></tag-select-input>

                {{-- Project planning --}}
                <h2 class="text-onyx-600 font-sans font-semibold text-left text-xl px-4 pb-1 pt-4">Project planning</h2>
                <hr class="mx-4 mb-6">

                <div class="w-full block md:flex">
                    <custom-input class="w-full md:w-1/2 mr-2" name="project-start-date" label="Start Date" type="date" error=""></custom-input>
                    <custom-input class="w-full md:w-1/2 ml-2" name="project-due-date" label="Due date" type="date" error=""></custom-input>
                </div>

                <div>
                    <button type="submit" class="my-4 btn btn-viridiant hover:text-cultured-100">Create project</button>
                </div>
            </form>

        </div>

        @yield('main')

    </div>
    <div class="hidden xl:block lg:w-1/6 xl:w-1/8">
        {{-- Side Right Block --}}
    </div>
</div>

@endsection
