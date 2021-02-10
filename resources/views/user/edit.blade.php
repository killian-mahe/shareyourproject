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
            <div class="px-3 py-3">
                {{-- First Name / Last Name --}}
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <custom-input class="w-full" name="email" label="First name" type="first_name" placeholder="Jan" value="user.first_name()"></custom-input>
                        <custom-input class="w-full" name="email" label="Last name" type="last_name" placeholder="Doe" value="user.last_name()"></custom-input>
                    </div>
                    <div class="flex items-center justify-center">
                        <div class="flex relative items-center justify-center">
                            <img class="rounded-full w-36 h-36" src="https://randomwordgenerator.com/img/picture-generator/57e7d4414d51a814f1dc8460962e33791c3ad6e04e50744172287cd09e49cd_640.jpg">
                            <div class="group absolute flex items-center justify-center">
                                <span class="bg-onyx-900 rounded-full opacity-0 w-36 h-36 group-hover:opacity-50 transform duration-200 ease-in-out cursor-pointer"></span>
                                <i class="text-cultured-100 h-5 w-5 opacity-0 absolute group-hover:opacity-100 transform duration-200 ease-in-out cursor-pointer" data-feather="edit-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="text-gray-600 text-xs italic w-1/2">Your name may appear around ShareYourProject where you contribute or are mentioned. You can change it at any time.</span>
                {{-- Company --}}
                <custom-input class="w-full mt-8" name="company" label="Company" type="company" placeholder="ex: Tesla Inc."></custom-input>
                {{-- Bio --}}
                <text-area class="mt-8" label="Bio" name="bio" placeholder="Tell us a little bit about yourself" rows="2" child_class="w-full" max_length="800"></text-area>
                {{-- Links --}}
                <custom-input class="w-full mt-4" name="link1" label="Links" type="link1" placeholder="ex: jane.doe@facebook.fr"></custom-input>
                <custom-input class="w-full" name="link2" type="link2" placeholder="ex: jane.doe@shareyourparthouse.fr"></custom-input>
                <custom-input class="w-full" name="link3" type="link3" placeholder="ex: jane.doe@lovelove.fr"></custom-input>
            </div>
        </div>
    </div>
    <div class="hidden xl:block lg:w-1/6 xl:w-1/8"></div>

</div>

@endsection
