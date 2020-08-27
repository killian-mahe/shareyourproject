@extends('layouts.app')

@section('content')
{{-- <h1>{{$project->owner}}</h1> --}}

<div class="page">
    <div class="side-container hidden sm:block w-1/4 md:w-1/5">
        <div class="w-full h-120 bg-cultured-100 rounded-lg shadow-md"></div>
    </div>
    <div class="center-container w-full mx-2 sm:mx-5 sm:w-3/5 md:w-2/3 lg:w-1/2">
        <div class="header">
            <div class="project-banner"> Banner</div>
            <div class="project-tags">tags-----------------------------------------</div>
            <div class="project-badges">badges</div>
        </div>
      <div class="card md:rounded-lg">
        <div class="card-title">
        <img class="rounded-full my-auto h-full w-auto hover:shadow-md" src="../assets/img/cesar-rincon-XHVpWcr5grQ-unsplash.jpg"/>
        <div class="flex flex-col ml-3 justify-start">
            <div class="font-sans font-bold text-base hover:underline"><a href="#">César Rincón</a></div>
            <span class="font-sans italic text-base">Web Designer</span>
        </div>
        </div>

        <div class="card-body md:text-lg">
        <p class="mb-4">
            I'm really happy to start this adventure with my new team !<br/>
            Thank you to Share Your Project for this amazing tool !
        </p>
        <img class="max-w-full rounded" src="../assets/img/jelle-plevier-aZu3og--G6c.jpg"/>
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
      <div class="card md:rounded-lg">
        <div class="card-title">
        <img class="rounded-full my-auto h-full w-auto hover:shadow-md" src="../assets/img/cesar-rincon-XHVpWcr5grQ-unsplash.jpg"/>
        <div class="flex flex-col ml-3 justify-start">
            <div class="font-sans font-bold text-base hover:underline"><a href="#">César Rincón</a></div>
            <span class="font-sans italic text-base">Web Designer</span>
        </div>
        </div>

        <div class="card-body md:text-lg">
        <p class="mb-4">
            I'm really happy to start this adventure with my new team !<br/>
            Thank you to Share Your Project for this amazing tool !
        </p>
        <img class="max-w-full rounded" src="../assets/img/jelle-plevier-aZu3og--G6c.jpg"/>
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
      <div class="card md:rounded-lg">
        <div class="card-title">
        <img class="rounded-full my-auto h-full w-auto hover:shadow-md" src="../assets/img/cesar-rincon-XHVpWcr5grQ-unsplash.jpg"/>
        <div class="flex flex-col ml-3 justify-start">
            <div class="font-sans font-bold text-base hover:underline"><a href="#">César Rincón</a></div>
            <span class="font-sans italic text-base">Web Designer</span>
        </div>
        </div>

        <div class="card-body md:text-lg">
        <p class="mb-4">
            I'm really happy to start this adventure with my new team !<br/>
            Thank you to Share Your Project for this amazing tool !
        </p>
        <img class="max-w-full rounded" src="../assets/img/jelle-plevier-aZu3og--G6c.jpg"/>
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
    </div>
    <div class="side-container hidden lg:w-1/5 lg:block">
        <div class="w-full h-120 bg-cultured-100 rounded-lg shadow-md"></div>
    </div>
</div>
@endsection
