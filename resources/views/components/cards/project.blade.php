<div class="bg-cultured-100 shadow md:rounded-lg flex mb-3 border-b-8 border-viridiant-600 min-h-14">
    <img class="w-1/4 md:rounded-tl-md object-cover" src="{{asset('vendor/courier/img/jeff-sheldon-8z2Q6XWLYa4.jpg')}}" alt="project_picture">
    <div class="p-3 flex flex-col justify-between w-full">
        <div>
            <h3 class="font-semibold mb-4">{{$project->name}}</h3>
            <p class="font-light text-sm">{{$project->description}}</p>
            <div class="mt-4 mb-2">
                @foreach ($project->technologies as $technology)
                    <badge-label label="{{$technology->label}}" link="#"></badge-label>
                @endforeach
            </div>
        </div>
        <div class="w-full flex justify-end items-center">
            <span class="relative w-24 h-7">
                @foreach ($project->members->slice(0, 1) as $member)
                    <img class="h-7 w-7 rounded-full absolute right-4" src="{{$member->profile_picture()}}" alt="">
                @endforeach

                @foreach ($project->members->slice(1, 1) as $member)
                    <img class="h-7 w-7 rounded-full absolute right-0" src="{{$member->profile_picture()}}" alt="">
                @endforeach
            </span>
            <span class="text-sm font-light ml-2">{{$project->members->count()}} members</span>
        </div>
    </div>
</div>
