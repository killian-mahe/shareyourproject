<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post as PostResource;

class PostController extends Controller
{
    /**
     * Instantiate a new PostController instance.
     */
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index', 'show', 'store'
        ]);

        $this->middleware('auth:api')->only([
            'store'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
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
            'content' => ['nullable', 'required_without:reshare', 'max:255'],
            'reshare' => ['numeric', 'exists:posts,id'],
            'image' => ['image'],
            'project' => ['nullable', 'numeric', 'exists:projects,id']
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
            $path = $request->file('image')->store('public/images');

            $image = new Image;
            $image->url = $path;
            $post->images()->save($image);
        }

        return response()->json(new PostResource($post), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.post', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
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
}
