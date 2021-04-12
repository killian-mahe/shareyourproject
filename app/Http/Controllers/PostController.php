<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use App\Models\Project;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post as PostResource;
use App\Notifications\PostCreated as NotificationsPostCreated;
use App\User;

class PostController extends Controller
{
    /**
     * Instantiate a new PostController instance.
     */
    public function __construct()
    {

        $this->middleware('auth:api')->only([
            'store'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => ['nullable', 'required_without_all:reshare', 'max:255'],
            'project' => ['nullable', 'numeric', 'exists:projects,id'],
            'reshare' => ['numeric', 'exists:posts,id'],
            'image' => ['array', 'max:3'],
            'image.*' => ['image', 'max:1500']
        ]);

        $post = new Post;

        if (array_key_exists('reshare', $validatedData))
        {
            $post->reshare_post($validatedData['reshare']);
        }
        $post->content = $validatedData['content'];

        $post->author()->associate(Auth::user());

        if (array_key_exists('project', $validatedData))
        {
            $project  = Project::where('id', $validatedData['project'])->first();
            $post->project()->associate($project);
        }
        $post->save();


        if (array_key_exists('image', $validatedData))
        {

            foreach($request->file('image') as $file)
            {
                $path = $file->store('public/images');

                $image = new Image;
                $image->url = $path;
                $post->images()->save($image);
            }
        }

        if ($post->project != NULL) {
            foreach ($post->project->members as $member) {
                $member->notify(new NotificationsPostCreated($post));
            }
        }

        return response()->json(new PostResource($post), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    /**
     * Like the post
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function like(Post $post)
    {
        $post->like(Auth::user());

        return response()->json(
            data: new PostResource($post),
            status: 200
        );
    }

    /**
     * Unlike the post
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function unlike(Post $post)
    {
        $post->unlike(Auth::user());

        return response()->json(
            data: new PostResource($post),
            status: 200
        );
    }
}
