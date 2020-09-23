<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Models\Project;
use App\Models\Post;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Project as ProjectResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('api.')->group(function() {

    Route::name('user.')->group(function() {

        Route::get('users/{user}', function (Request $request, User $user) {
            return new UserResource($user);
        })->name('get');

    });

    Route::name('project.')->group(function() {

        Route::get('projects/{project}', function (Request $request, Project $project) {
            return new ProjectResource($project);
        })->name('get');

        Route::post('projects/get', function (Request $request) {
            $projects = collect([]);
            if ($request->input('projects_ids'))
            {
                foreach ($request->input('projects_ids') as $project_id) {
                    $projects->push(Project::find($project_id));
                }
            }
            return ProjectResource::collection($projects);
        })->name('getMany');

    });

    Route::name('post.')->group(function() {

        Route::get('posts/{post}/like', function (Request $request, Post $post) {
            Auth::user()->liked_posts()->attach($post);
            return json_encode(['ok' => true]);
        })->middleware('auth:api')->name('like');

        Route::get('posts/{post}/unlike', function (Request $request, Post $post) {
            Auth::user()->liked_posts()->detach($post);
            return json_encode(['ok' => true]);
        })->middleware('auth:api')->name('unlike');

    });

});
