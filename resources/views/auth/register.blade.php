@extends('layouts.app')

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@section('content')

<div class="flex w-full h-screen">
    <img class="w-auto h-full bg-blur-3" src="{{ asset('vendor/courier/img/jeff-sheldon-8z2Q6XWLYa4.jpg') }}" alt="" />
    <div class="absolute right-0 px-12 pt-16 h-full bg-white w-full md:w-1/2 lg:w-5/12 justify-center">
        <h1 class="text-onyx-600 font-sans font-bold text-center text-4xl mb-6">Register</h1>
        <hr class="mb-12 mx-3">
        <form class="w-full" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <custom-input class="w-full md:w-1/2 px-3 mb-6 md:mb-0" name="first-name" label="First Name" type="text" placeholder="Jane" error="@error('first-name') {{ $message }} @enderror"></custom-input>
                <custom-input class="w-full md:w-1/2 px-3" name="last-name" label="Last Name" type="text" placeholder="Doe" error="@error('last-name') {{ $message }} @enderror"></custom-input>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <custom-input class="w-full px-3 mb-6 md:mb-0" name="username" label="Username" type="text" placeholder="jane-doe" error="@error('username') {{ $message }} @enderror"></custom-input>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <custom-input class="w-full px-3" name="email" label="E-mail" type="email" placeholder="jane.doe@shareyourproject.fr" error="@error('email') {{ $message }} @enderror"></custom-input>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <custom-input class="w-full md:w-1/2 px-3 mb-6 md:mb-0" name="password" label="Password" type="password" placeholder="******************" indication="Make it as long and as crazy as you'd like" error="@error('password') {{ $message }} @enderror"></custom-input>
                <custom-input class="w-full md:w-1/2 px-3" name="password_confirmation" label="Confirm Password" type="password" placeholder="******************" error="@error('password_confirmation') {{ $message }} @enderror"></custom-input>
            </div>
            <button type="submit" class="border border-viridiant-300 rounded-full font-semibold px-4 py-2 hover:bg-viridiant-300 hover:text-white transition-colors duration-100 ease-in-out">Submit</button>
        </form>
    </div>
</div>

@endsection
