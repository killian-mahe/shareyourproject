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
        $projects = Project::where('name', 'like', '%'.$search.'%')->get();
        $users = User::where('first_name', 'like', '%'.$search.'%')
                        ->orWhere('last_name', 'like', '%'.$search.'%')->get();
        return response()->json([
            'projects' => ProjectResource::collection($pojects),
            'users' => UserResource::collection($users)
        ], 200);
    }
}
