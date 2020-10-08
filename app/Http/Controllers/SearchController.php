<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Project as ProjectResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Badge as BadgeResource;
use App\Http\Resources\Tag as TagResource;
// Models
use App\User;
use App\Models\Technology;
use App\Models\Project;
use App\Models\Tag;

class SearchController extends Controller
{
    /**
     * Get search feature
     *
     * @param \Illuminate\Http\Request $request
     * @param String $search
     * @return Response
     */
    public function index(Request $request, string $search)
    {
        $projects = Project::where('name', 'like', '%'.$search.'%')->limit(5)->get();
        $users = User::where('first_name', 'like', '%'.$search.'%')
                        ->orWhere('last_name', 'like', '%'.$search.'%')
                        ->orWhere('username', 'like', '%'.$search.'%')
                        ->orWhereRaw(
                            "concat(first_name, ' ', last_name) like '%" . $search . "%' "
                        )->limit(5)->get();
        return response()->json([
            'projects' => ProjectResource::collection($projects),
            'users' => UserResource::collection($users)
        ], 200);
    }

    /**
     * Get badges
     *
     * @param \Illuminate\Http\Request $request
     * @param String $search
     * @return \App\Http\Resources\Badge
     */
    public function badges(Request $request, string $search)
    {
        $technologies = Technology::where('label', 'like', '%'.$search.'%')->limit(5)->get();

        return response()->json(BadgeResource::collection($technologies));
    }

    /**
     * Get tags
     *
     * @param \Illuminate\Http\Request $request
     * @param String $search
     * @return \App\Http\Resources\Tag
     */
    public function tags(Request $request, string $search)
    {
        $tags = Tag::where('name', 'like', '%'.$search.'%')->limit(7)->get();

        return response()->json(TagResource::collection($tags));
    }
}
