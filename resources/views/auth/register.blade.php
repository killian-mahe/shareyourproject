@extends('layouts.auth')

@section('content')

<div class="flex w-full h-screen">
    <img class="hidden md:block w-auto h-full bg-blur-3" src="{{ asset('vendor/courier/img/jeff-sheldon-8z2Q6XWLYa4.jpg') }}" alt="" />
    <div class="absolute right-0 px-12 pt-16 md:h-full py-12 bg-white w-full md:w-1/2 lg:w-5/12 justify-center">
        <h1 class="text-onyx-600 font-sans font-bold text-center text-4xl mb-6">Register</h1>
        <hr class="mb-12 mx-3">
        <form class="w-full" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <custom-input class="w-full md:w-1/2 px-3 mb-6 md:mb-0" name="first-name" label="First Name" type="text" placeholder="Jane" error="@error('first-name') {{ $message }} @enderror" value="{{ old('first-name') }}"></custom-input>
                <custom-input class="w-full md:w-1/2 px-3" name="last-name" label="Last Name" type="text" placeholder="Doe" error="@error('last-name') {{ $message }} @enderror" value="{{ old('last-name') }}"></custom-input>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <custom-input class="w-full px-3 mb-6 md:mb-0" name="username" label="Username" type="text" placeholder="jane-doe" error="@error('username') {{ $message }} @enderror" value="{{ old('username') }}"></custom-input>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <custom-input class="w-full px-3" name="email" label="E-mail" type="email" placeholder="jane.doe@shareyourproject.fr" error="@error('email') {{ $message }} @enderror" value="{{ old('email') }}"></custom-input>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <custom-input class="w-full md:w-1/2 px-3 mb-6 md:mb-0" name="password" label="Password" type="password" placeholder="******************" indication="Make it as long and as crazy as you'd like" error="@error('password') {{ $message }} @enderror"></custom-input>
                <custom-input class="w-full md:w-1/2 px-3" name="password_confirmation" label="Confirm Password" type="password" placeholder="******************" error="@error('password_confirmation') {{ $message }} @enderror"></custom-input>
            </div>
            <i class="block mb-3 text-sm">Already have an account ? <a class="font-medium" href="{{route('login')}}">Log In</a></i>
            <button type="submit" class="my-4 btn btn-viridiant hover:text-cultured-100">Sign Up</button>
        </form>
    </div>
</div>

@endsection
