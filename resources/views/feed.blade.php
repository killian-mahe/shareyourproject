@extends('layouts.app')

@section('content')
<div class="flex justify-center mt-4 min-h-screen">
    <div class="w-full md:w-2/3 lg:w-2/5 mx-auto">
        @auth
            <div class="text-2xl font-semibold text-gray-800 py-5">
                Bonjour {{Auth::user()->first_name}} !
            </div>
        @endauth

        <feed-view :initial_posts='@json(App\Http\Resources\Post::collection($posts))' @auth :auth_user='@json(new \App\Http\Resources\User(Auth::user()))' @endauth></feed-view>
    </div>
</div>
@endsection
