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
            $followed_projects = Auth::user()->followed_projects;
            foreach ($followed_projects as $project) {
                $posts = $posts->merge($project->posts()->latest()->limit(3)->get());
            }
        } else {
            $posts = $posts->merge(Post::all()->random(10));
        }

        return view('feed', ['posts' => $posts->sortByDesc('created_at')]);
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
            if (Auth::user()) {

                $followed_projects = Auth::user()->followed_projects;
                foreach ($followed_projects as $project) {
                    $posts = $posts->merge($project->posts()->whereNotIn('id', $validatedData['except'])->latest()->limit(3)->get());
                }

            }
        }

        if ($posts->count() > 0) {
            return response()->json(PostResource::collection($posts->sortByDesc('created_at')), 200);
        } else {
            return response([], 204);
        }
    }

}
