@extends('user.edit.layout')

@section('main')

    {{-- Main Content --}}
    <div class="w-full">
        <div class="box w-full h-auto p-3 md:p-6">
            <div class="font-semibold text-xl border-b pb-3 w-full mb-4 ml-2">Public Profile Settings</div>
            <form class="px-2 py-2 md:px-3 md:py-3" method="POST" action="{{route('users.settings.profile', ['user' => $user->id])}}">
                {{-- First Name / Last Name --}}
                <div class="w-full flex items-center space-x-3 md:space-x-8 space-x-3">
                    <div class="w-1/2 md:w-full xl:w-1/2 space-y-6">
                        <custom-input class="w-full" name="first_name" label="First name" type="text" placeholder="Jan" value="{{$user->first_name}}" @error('first_name') error="{{ $message }}" @enderror></custom-input>
                        <custom-input class="w-full" name="last_name" label="Last name" type="text" placeholder="Doe" value="{{$user->last_name}}" @error('last_name') error="{{ $message }}" @enderror></custom-input>
                    </div>
                    {{-- Profile Picture --}}
                    <div class=" w-1/2 md:w-1/4 md:flex-none md:mx-8 lg:w-1/3 xl:w-1/2 flex items-center justify-center">
                        {{-- <div class="flex relative items-center justify-center">
                            <img class="rounded-full w-32 h-32 md:w-36 md:h-36" src="https://randomwordgenerator.com/img/picture-generator/57e7d4414d51a814f1dc8460962e33791c3ad6e04e50744172287cd09e49cd_640.jpg">
                            <div class="group absolute flex items-center justify-center">
                                <span class="bg-onyx-900 rounded-full opacity-0 w-32 h-32 md:w-36 md:h-36 group-hover:opacity-50 transform duration-200 ease-in-out cursor-pointer"></span>
                                <i class="text-cultured-100 h-5 w-5 opacity-0 absolute group-hover:opacity-100 transform duration-200 ease-in-out cursor-pointer" data-feather="edit-3"></i>
                            </div>
                        </div> --}}
                        <div class="w-full h-full">
                            <picture-input img_radius="full" img_height="12rem" img_path="https://randomwordgenerator.com/img/picture-generator/57e7d4414d51a814f1dc8460962e33791c3ad6e04e50744172287cd09e49cd_640.jpg"></picture-input>
                        </div>
                    </div>
                </div>
                <span class="text-gray-600 text-xs italic w-1/2">Your name may appear around ShareYourProject where you contribute or are mentioned. You can change it at any time.</span>
                {{-- Company --}}
                <custom-input class="w-full mt-8" name="title" label="Company" type="text" value="{{$user->title}}" placeholder="ex: Tesla Inc." @error('title') error="{{ $message }}" @enderror></custom-input>
                {{-- Bio --}}
                <text-area class="mt-8" label="Bio" name="bio" placeholder="Tell us a little bit about yourself" rows="2" value="{{$user->bio}}" child_class="w-full" max_length="800" @error('bio') error="{{ $message }}" @enderror></text-area>

                {{-- Links --}}
                <div class="w-full flex-none space-y-2">
                    <div class="w-full flex items-center space-x-4 mt-4">
                        <i class="text-onyx-800 h-5 w-5 cursor-pointer" data-feather="facebook"></i>
                        <custom-input class="w-full" name="link1" type="url" placeholder="ex: jane.doe@facebook.fr"></custom-input>
                    </div>
                    <div class="w-full flex items-center space-x-4">
                        <i class="text-onyx-800 h-5 w-5 cursor-pointer" data-feather="linkedin"></i>
                        <custom-input class="w-full" name="link2" type="url" placeholder="ex: jane.doe@linkedin.fr"></custom-input>
                    </div>
                    <div class="w-full flex items-center space-x-4">
                        <i class="text-onyx-800 h-5 w-5 cursor-pointer" data-feather="github"></i>
                        <custom-input class="w-full" name="link3" type="url" placeholder="ex: jane.doe@github.fr"></custom-input>
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
