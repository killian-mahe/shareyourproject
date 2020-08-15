@extends('layouts.app')

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@section('content')

<div class="bg-viridiant-600 w-full h-screen flex items-center">
    <div class="m-auto p-5 bg-cultured-600 shadow-lg rounded-lg">
        <form class="w-full">
            <div class="flex flex-wrap -mx-3 mb-6">
                <custom-input class="w-full md:w-1/2 px-3 mb-6 md:mb-0" label="First Name" type="text" placeholder="Jane"></custom-input>
                <custom-input class="w-full md:w-1/2 px-3" label="Last Name" type="text" placeholder="Doe"></custom-input>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <custom-input class="w-full px-3" label="Password" type="password" placeholder="******************" indication="Make it as long and as crazy as you'd like"></custom-input>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <custom-input class="w-full md:w-1/3 px-3 mb-6 md:mb-0" label="City" type="text" placeholder="Brest"></custom-input>
                <select-input class="w-full md:w-1/3 px-3 mb-6 md:mb-0" label="State" v-bind:options="[{text: 'New Mexico', value: 'mexico'}]"></select-input>
                <custom-input class="w-full md:w-1/3 px-3 mb-6 md:mb-0" label="Zip" type="text" placeholder="29280"></custom-input>
            </div>
        </form>
    </div>
</div>

@endsection

