@extends('user.edit.layout')

@section('main')

    {{-- Main Content --}}
    <div class="w-full">
        <div class="box w-full h-auto p-3 md:p-6">
            <div class="font-semibold text-xl border-b pb-3 w-full mb-4 ml-2">Account Settings</div>
            <form class="px-2 py-2 md:px-3 md:py-3" method="POST" action="{{route('users.settings.account', ['user'=>$user->id])}}">
                {{-- Email - Password --}}
                <div class="w-full grid grid-cols-1 md:grid-cols-2 grid-rows-3 gap-4">
                    <div >
                        <custom-input name="email" label="E-mail" type="text" placeholder="jane.doe@shareyourproject.fr" @error('email') error="{{ $message }}" @enderror value="{{$user->email}}"></custom-input>
                    </div>
                    <div class="hidden md:block"></div>
                    <div>
                        <custom-input name="password" label="New password" type="text" placeholder="******************" value=""></custom-input>
                    </div>
                    <div>
                        <custom-input class="w-full" name="password_confirmation" label="Confirm your new password" type="text" placeholder="******************" value=""></custom-input>
                    </div>
                    <div>
                        {{-- Pseudo --}}
                        <custom-input name="pseudo" label="Pseudo" type="text" placeholder="Art3mis/Daito" @error('pseudo') error="{{ $message }}" @enderror value="{{$user->username}}"></custom-input>
                    </div>
                </div>

                <input name="_method" type="hidden" value="PUT">
                @csrf
                <div class="w-full flex justify-center">
                    <button class="btn btn-viridiant mt-5" type="submit">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

@endsection
