<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Tag as TagResource;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Instantiate a new TechnologyController instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get badges
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\Badge
     */
    public function search(Request $request)
    {
        $query = $request->query('query');
        $tags = Tag::where('label', 'like', '%'.$query.'%')->limit(5)->get();

        return response()->json(
            data: TagResource::collection($tags),
            status: 200
        );
    }
}
