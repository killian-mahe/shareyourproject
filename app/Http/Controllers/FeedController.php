<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post as PostResource;
use Illuminate\Http\Request;
use App\Models\Post;

class FeedController extends Controller
{
    /**
     * Instantiate a new FeedController instance.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->only([
            'load'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = new Collection();
        if (Auth::user()) {
            $projects_members = Auth::user()->projects;
            foreach ($projects_members as $project) {
                $posts = $posts->merge($project->posts()->latest()->limit(3)->get());
            }
        }

        return view('feed', ['posts' => $posts]);
    }

    /**
     * Loading more posts
     *
     * @param \Illuminate\Http\Request $request
     */
    public function load(Request $request)
    {
        $validatedData = $request->validate([
            'except' => ['array', 'nullable'],
        ]);

        $posts = new Collection();

        if ($validatedData['except'] != NULL)
        {

            $projects_members = Auth::user()->projects;
            foreach ($projects_members as $project) {
                $posts = $posts->merge($project->posts()->whereNotIn('id', $validatedData['except'])->latest()->limit(3)->get());
            }

            $posts = $posts->merge(Post::all()->whereNotIn('id', $validatedData['except'])->random(10));
        }

        if ($posts->count() > 0) {
            return response()->json(PostResource::collection($posts), 200);
        } else {
            return response([], 204);
        }
    }

}
