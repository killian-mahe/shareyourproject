@extends('user.edit.layout')

@section('main')

    {{-- Main Content --}}
    <div class="w-full">
        <div class="box w-full h-auto p-3 md:p-6">
            <div class="font-semibold text-xl border-b pb-3 w-full mb-4 ml-2">Account Settings</div>
            <div class="px-2 py-2 md:px-3 md:py-3">
                {{-- Email - Password --}}
                <div class="w-full grid grid-cols-1 md:grid-cols-2 grid-rows-3 gap-4">
                    <div >
                        <custom-input name="email" label="E-mail" type="text" placeholder="jane.doe@shareyourproject.fr" value="user.email()"></custom-input>
                    </div>
                    <div class="hidden md:block"></div>
                    <div>
                        <custom-input name="password" label="Password" type="text" placeholder="******************" value="user.password()"></custom-input>
                    </div>
                    <div>
                        <custom-input class="w-full" name="confirm_password" label="Confirm Password" type="text" placeholder="******************" value="user.password()"></custom-input>
                    </div>
                    <div>
                        {{-- Pseudo --}}
                        <custom-input name="pseudo" label="Pseudo" type="text" placeholder="Art3mis/Daito" value="user.pseudo()"></custom-input>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
