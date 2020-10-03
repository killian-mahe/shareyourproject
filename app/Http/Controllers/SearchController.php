<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Project as ProjectResource;
use App\Http\Resources\User as UserResource;
// Models
use App\User;
use App\Models\Project;

class SearchController extends Controller
{
    public function index(Request $request, string $search)
    {
        $projects = Project::where('name', 'like', '%'.$search.'%')->limit(5)->get();
        $users = User::where('first_name', 'like', '%'.$search.'%')
                        ->orWhere('last_name', 'like', '%'.$search.'%')->limit(5)->get();
        return response()->json([
            'projects' => ProjectResource::collection($projects),
            'users' => UserResource::collection($users)
        ], 200);
    }
}
