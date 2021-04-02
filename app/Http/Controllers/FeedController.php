<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PostCollection;
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
    public function get(Request $request)
    {
        $posts = new Collection();
        if (Auth::user())
        {
            $posts = $this->getWithAuth($request);
        } else {
            $posts = $this->getWithoutAuth($request);
        }

        return new PostCollection($posts);
    }

    /**
     * @return Illuminate\Support\Collection
     */
    protected function getWithAuth(Request $request)
    {
        $project_ids = $request->user()->followed_projects->pluck('id');

        $posts = Post::whereIn('project_id', $project_ids);

        return $posts->paginate(5);
    }

    /**
     * @return Illuminate\Support\Collection
     */
    protected function getWithoutAuth(Request $request)
    {
        return Post::paginate(5);
    }

}
