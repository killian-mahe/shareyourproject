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

            <form action="">
                <custom-input class="w-full md:w-1/2 mb-4" name="project-name" label="Project name" indication="Great project names are short and memorable." type="text" placeholder="ex : Share Your Project" error=""></custom-input>
                <custom-input class="w-full mb-4" name="description" label="Description" type="text" error=""></custom-input>
                <custom-input class="w-full mb-4" name="description" label="Add a new collaborator" placeholder="ex : John Doe" type="text" error=""></custom-input>
            </form>

            {{-- Select you badge(s) --}}
            <div class="inline-flex w-full rounded-md shadow-sm mb-4">
                <button class="flex relative items-center cursor-pointer w-full rounded-lg border border-gray-300 bg-cultured-100 pl-4 pr-10 py-3 text-left focus:border-2 focus:border-viridiant-600">
                    <span class="block truncate">Select your badge(s)</span>
                    <i class="text-onyx-300 my-auto h-4 w-4 cursor-pointer absolute right-3 transform rotate-90" data-feather="code"></i>
                </button>
            </div>

            {{-- Add a hashtag  --}}
            <div class="inline-flex w-auto rounded-md shadow-sm mb-4">
                <button class="flex relative items-center cursor-pointer w-auto rounded-lg border border-gray-300 bg-cultured-100 pl-4 pr-10 py-3 text-left focus:border-2 focus:border-viridiant-600">
                    <span class="block truncate">Add a hashtag</span>
                    <i class="text-onyx-300 my-auto h-4 w-4 cursor-pointer absolute right-3 transform rotate-90" data-feather="plus-circle"></i>
                </button>
            </div>

            <div>
                <a href="#" class="my-4 btn btn-viridiant hover:text-cultured-100">Create project</a>
            </div>
        </div>

        @yield('main')

    </div>
    <div class="hidden xl:block lg:w-1/6 xl:w-1/8">
        {{-- Side Right Block --}}
    </div>

</div>

@endsection
