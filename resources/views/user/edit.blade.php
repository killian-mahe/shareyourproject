@extends('layouts.app')

@section('content')

<div class="flex justify-center mt-4 min-h-screen">
    {{-- Menu Navigation --}}
    <div class="hidden md:block md:w-1/3 md:ml-4 lg:w-1/4 xl:w-1/6">
        <div class="box w-full h-auto mb-4 flex flex-col flex-none py-2 p-5 mt-48">
            <a class="py-2 px-6">Profile</a>
            <a class="py-2 px-6">Account</a>
            <a class="py-2 px-6">Notifications</a>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="w-full md:w-2/3 lg:w-1/2 mx-4">
        <div class="box w-full h-auto p-6">
            <div class="font-semibold text-xl border-b pb-3 w-full mb-4">Public Profile</div>
            <div class="card-body">
                <div class="flex">
                    <custom-input class="w-1/2 px-3" name="email" label="First name" type="first_name" placeholder="jane.doe@shareyourproject.fr" value="user.first_name()"></custom-input>
                    <custom-input class="w-1/2 px-3" name="email" label="Last name" type="last_name" placeholder="jane.doe@shareyourproject.fr" value="user.last_name()"></custom-input>
                </div>
                <span class="text-gray-600 text-xs italic mx-3">Your name may appear around ShareYourProject where you contribute or are mentioned. You can change it at any time.</span>
                <textarea label="Bio" name="bio" placeholder="user's bio" rows="2" class="appearance-none bg-white text-gray-700 border-2 border-gray-200 rounded-md py-3 px-4 leading-tight focus:outline-none w-full focus:border-viridiant-600 my-4"></textarea>
            </div>
        </div>
    </div>
    <div class="hidden xl:block lg:w-1/6 xl:w-1/8"></div>

</div>

@endsection
