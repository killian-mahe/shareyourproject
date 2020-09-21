@if (isset($right) && $right)

    <div class="bg-cultured-100 w-auto mb-6 p-6 justify-end lg:flex md:rounded-lg shadow">
        <div class="text-center lg:text-right">
            <a href="#" class="text-lg hover:underline">{{$member->full_name()}}</a>
            <div class="text-viridiant-600 italic">{{$member->title}}</div>
            <a href="#" class="text-gray-600 hover:text-onyx-600 hover:underline">{{$member->email}}</a>
        </div>
        <a href="#"><img class="h-20 w-20 rounded-full transform ease-in-out duration-200 lg:h-22 lg:w-22 mx-auto lg:mr-0 lg:ml-6 hover:scale-105 hover:shadow-md" src="{{$member->profile_picture()}}"></a>
    </div>

@else

    <div class="bg-cultured-100 w-auto mb-6 p-6 lg:flex md:rounded-lg shadow">
        <a href="#"><img class="h-20 w-20 rounded-full transform ease-in-out duration-200 lg:h-22 lg:w-22 mx-auto lg:ml-0 lg:mr-6 hover:scale-105 hover:shadow-md" src="{{$member->profile_picture()}}"></a>
        <div class="text-center lg:text-left">
            <a href="#" class="text-lg hover:underline">{{$member->full_name()}}</a>
            <div class="text-viridiant-600 italic">{{$member->title}}</div>
            <a href="#" class="text-gray-600 hover:text-onyx-600 hover:underline">{{$member->email}}</a>
        </div>
    </div>

@endif
