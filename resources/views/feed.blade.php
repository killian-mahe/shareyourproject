@extends('layouts.app')

@section('content')
<div class="flex justify-center min-h-screen">
    <div class="w-full md:w-2/3 lg:w-2/3 xl:w-2/5 mx-auto">
        @auth
            <div class="text-2xl font-semibold text-gray-800 mt-5 pl-5 md:pl-0">
                Bonjour {{Auth::user()->first_name}} !
            </div>
        @endauth

        <feed-view class="pt-5" :initial_posts='@json(App\Http\Resources\Post::collection($posts))' @auth :auth_user='@json(new \App\Http\Resources\User(Auth::user()))' @endauth></feed-view>
    </div>
</div>
@endsection
