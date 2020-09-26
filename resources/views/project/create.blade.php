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
                    <button class="flex relative items-center cursor-pointer w-full rounded-lg border border-gray-300 bg-cultured-100 pl-4 pr-10 py-3 text-left hover:border-gray-400 focus:border-viridiant-600">
                        <span class="block truncate">Select your badge(s)</span>
                        <i class="text-onyx-900 my-auto h-4 w-4 cursor-pointer absolute right-3 transform rotate-90" data-feather="code"></i>
                    </button>
                </div>

                {{-- Add a hashtag
                <div class="inline-flex w-auto rounded-md shadow-sm mb-4">
                    <button class="flex relative items-center cursor-pointer w-auto rounded-lg border border-gray-300 bg-cultured-100 pl-4 pr-10 py-3 text-left hover:border-gray-400 focus:border-viridiant-600">
                        <span class="block truncate">Add a hashtag</span>
                        <i class="text-onyx-900 my-auto h-4 w-4 cursor-pointer absolute right-3 transform rotate-90" data-feather="plus-circle"></i>
                    </button>
                </div> --}}


                {{-- Project status --}}
                {{-- Probleme outline --}}
                <div class="inline-block relative w-auto">
                    <select class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 focus:border-viridiant-600 px-4 py-3 pr-8 rounded-lg shadow-sm focus:outline-none focus:shadow-outline">
                        <option>Ongoing</option>
                        <option>On break</option>
                        <option>Finished</option>
                        <option>Abandoned</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class="text-onyx-900 my-auto h-4 w-4 cursor-pointer absolute right-3 transform rotate-90" data-feather="code"></i>
                    </div>
                </div>

                {{-- Add a hashtag --}}
                {{-- Probleme d'alignement de labal --}}
                <div class="relative w-auto">
                    <custom-input class="w-full md:w-1/2 mb-4 pl-10" name="description" label="Add a Hash-Tag" placeholder="trucmuche" type="text" error=""></custom-input>
                    <i class="text-onyx-900 h-4 w-4 cursor-pointer absolute top-11 left-3" data-feather="hash"></i>
                </div>


                {{-- Project planning --}}
                <h2 class="text-onyx-600 font-sans font-semibold text-left text-xl px-4 pb-1 pt-4">Project planning</h2>
                <hr class="mx-4 mb-6">

            <div class="w-full block md:flex">
                <custom-input class="w-full md:w-1/2 mr-2" name="project-start-date" label="Start Date" type="date" error=""></custom-input>
                <custom-input class="w-full md:w-1/2 ml-2" name="project-due-date" label="Due date" type="date" error=""></custom-input>
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


    <div class="block">
        <label for="price" class="block text-sm leading-5 font-medium text-gray-700">Price</label>
        <div class="mt-1 relative rounded-md shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <span class="text-gray-500 sm:text-sm sm:leading-5">
              $
            </span>
          </div>
          <input id="price" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5" placeholder="0.00">
          <div class="absolute inset-y-0 right-0 flex items-center">
            <select aria-label="Currency" class="form-select h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm sm:leading-5">
              <option>USD</option>
              <option>CAD</option>
              <option>EUR</option>
            </select>
          </div>
        </div>
      </div>

</div>

@endsection
