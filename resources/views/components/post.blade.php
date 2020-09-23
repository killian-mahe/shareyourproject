{{-- <div class="card md:rounded-lg">
    <div class="card-title">
        <a href="{{route('users.show', ['user'=>$post->author_id])}}" class="w-auto inline-grid">
            <img class="rounded-full my-auto h-full w-auto hover:shadow-md" src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80"/>
        </a>
        <div class="flex flex-col ml-3 justify-start w-full">
            <div class="font-sans font-bold text-base hover:underline"><a href="{{route('users.show', ['user'=>$post->author_id])}}">{{$post->author->full_name()}}</a></div>
            <span class="font-sans italic text-base">{{$post->author->title}}</span>
        </div>
    </div>

    <div class="card-body md:text-lg">
        <p class="mb-4">
            {{$post->content}}
        </p>
        <img class="max-w-full rounded" src="https://cdn.pixabay.com/photo/2016/08/10/18/04/eat-1583954_1280.jpg"/>
        <div class="card-tags">
            <span class="tag">Work</span>
            <span class="tag">Team</span>
        </div>
    </div>

    <div class="card-footer">
        <div class="card-link">
            @if (Auth::user()->does_it_like($post))
                <span class="cursor-pointer text-red-600 fill-current"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="true" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg><span class="ml-1 hidden md:inline">Liked</span></span>
            @else
                <span class="cursor-pointer hover:text-red-600 fill-current"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg><span class="ml-1 hidden md:inline">I like</span></span>
            @endif
        </div>
        <div class="card-link">
            <a class="hover:text-orange-peel-400" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg><span class="ml-1 hidden md:inline">Comment</span></a>
        </div>
        <div class="card-link">
            <a class="hover:text-viridiant-400" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg><span class="ml-1 hidden md:inline">Share</span></a>
        </div>
    </div>
</div> --}}

<post-card :post_props='@json(new \App\Http\Resources\Post($post))'></post-card>
