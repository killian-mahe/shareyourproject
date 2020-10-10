@extends('layouts.auth')


@section('content')

<div class="flex w-full h-screen">
    <img class="hidden md:block w-auto h-full bg-blur-3" src="{{ asset('vendor/courier/img/jeff-sheldon-8z2Q6XWLYa4.jpg') }}" alt="" />
    <div class="absolute right-0 px-12 md:px-24 pt-16 h-full py-12 bg-white w-full md:w-1/2 lg:w-5/12 justify-center">
        <h1 class="text-onyx-600 font-sans font-bold text-center text-4xl mb-6">Login</h1>
        <hr class="mb-12 mx-3">
        <form class="w-full" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <custom-input class="w-full px-3" name="email" label="E-mail" type="email" placeholder="jane.doe@shareyourproject.fr" error="@error('email') {{ $message }} @enderror" value="{{ old('email') }}"></custom-input>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <custom-input class="w-full px-3 mb-6 md:mb-0" name="password" label="Password" type="password" placeholder="******************" error="@error('password') {{ $message }} @enderror"></custom-input>
            </div>
            <i class="block mb-3 text-sm">No account yet ? <a class="font-medium" href="{{route('register')}}">Register</a></i>
            <button type="submit" class="my-4 btn btn-viridiant hover:text-cultured-100">Log In</button>
        </form>
    </div>
</div>

@endsection

