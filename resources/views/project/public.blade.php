@extends('layouts.app')

@section('content')
{{-- <h1>{{$project->owner}}</h1> --}}

<div class="w-full h-auto bg-cultured-400 flex justify-center py-6">
    <div class="sticky top-6 h-full justify-center flex-row hidden sm:block w-1/4 md:w-1/4 lg:w-1/6 bg-red-300">
        <div class="w-full h-120 bg-cultured-100 rounded-lg shadow-md"></div>
    </div>
    <div class="w-full mx-2 sm:mx-5 sm:w-3/5 md:w-2/3 lg:w-1/2 rounded-lg">
        <div class="w-full h-auto mb-6 shadow bg-cultured-100 md:rounded-lg">
            <div class="flex relative justify-center">
                <img class=" md:rounded-lg object-cover w-full h-48 shadow-md" src="https://cdn.pixabay.com/photo/2013/03/06/23/09/color-91059_1280.jpg" alt="test">
                <img class=" border-4 border-cultured-100 shadow-md object-cover w-40 h-40 rounded-full mx-auto sm:left-8 lg:left-16 -bottom-12 absolute" src="https://cdn.pixabay.com/photo/2016/03/27/17/42/man-1283235_960_720.jpg" alt="test">
            </div>
            <div class="text-center md:text-right font-semibold font-sans text-2xl md:mr-1/7 mt-12 md:my-4">{{$project->name}}</div>
            <span class="bg-yellow-300">{{$project->owner->username}}</span>
            <div class="">{{$project->created_at}}</div>
            <div class="tags w-full h-auto bg-yellow-300"></div>
            <div class="badges w-full h-auto bg-indigo-300"></div>
        </div>

        @foreach ($project->posts as $post)

            <div class="card md:rounded-lg">
                <div class="card-title">
                <img class="rounded-full my-auto h-full w-auto hover:shadow-md" src="https://cdn.pixabay.com/photo/2016/08/10/18/04/eat-1583954_1280.jpg"/>
                <div class="flex flex-col ml-3 justify-start">
                    <div class="font-sans font-bold text-base hover:underline"><a href="#">{{$post->author->username}}</a></div>
                    <span class="font-sans italic text-base">Web Designer</span>
                </div>
                </div>

                <div class="card-body md:text-lg">
                <p class="mb-4">
                    {{$post->content}}
                </p>
                <img class="max-w-full rounded" src="https://cdn.pixabay.com/photo/2016/08/10/18/04/eat-1583954_1280.jpg"/>
                <div class="card-tags">
                    <span class="tag">Work</span>
                    <span class="tag">Team</span>
                </div>
                </div>

                <div class="card-footer">
                <div class="card-link">
                    <a class="hover:text-red-600" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg><span class="ml-1 hidden md:inline">I like</span></a>
                </div>
                <div class="card-link">
                    <a class="hover:text-orange-peel-400" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg><span class="ml-1 hidden md:inline">Comment</span></a>
                </div>
                <div class="card-link">
                    <a class="hover:text-viridiant-400" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg><span class="ml-1 hidden md:inline">Share</span></a>
                </div>
                </div>
            </div>

        @endforeach

    </div>
</div>
@endsection
