<?php

use App\Http\Controllers\FeedController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Models\Project;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Project as ProjectResource;
use App\Http\Resources\Comment as CommentResource;

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

// Route::post('login', 'Auth\LoginController@authenticate')->name('api.login');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('feed.')->prefix('feed')->group(function() {
    Route::get('/', [FeedController::class, 'get'])->name('get');
});

// Route::middleware(['auth:sanctum', 'api'])->group(function () {

//     Route::name('api.')->group(function() {

//         Route::get("test", function() {
//             return 'Hello !';
//         });

//         Route::name('user.')->group(function() {

//             Route::get('users/{user}', function (Request $request, User $user) {
//                 return new UserResource($user);
//             })->name('get');

//             Route::get('users/search/{search}', 'UserController@search')->where('search', '.*')->name('search');

//         });

//         Route::name('project.')->group(function() {

//             Route::get('projects/{project}', function (Request $request, Project $project) {
//                 return new ProjectResource($project);
//             })->name('get');

//             Route::post('projects/get', function (Request $request) {
//                 $projects = collect([]);
//                 if ($request->input('projects_ids'))
//                 {
//                     foreach ($request->input('projects_ids') as $project_id) {
//                         $projects->push(Project::find($project_id));
//                     }
//                 }
//                 return ProjectResource::collection($projects);
//             })->name('getMany');

//             Route::get('projects/{project}/follow', function(Request $request, Project $project) {
//                 Auth::user()->followed_projects()->attach($project->id);
//                 return json_encode(['ok' => true]);
//             })->middleware('auth:api')->name('follow');

//             Route::get('projects/{project}/unfollow', function(Request $request, Project $project) {
//                 Auth::user()->followed_projects()->detach($project->id);
//                 return json_encode(['ok' => true]);
//             })->middleware('auth:api')->name('unfollow');

//         });

//         Route::name('post.')->group(function() {

//             Route::get('posts/{post}/like', function (Request $request, Post $post) {
//                 Auth::user()->liked_posts()->attach($post);
//                 return json_encode(['ok' => true]);
//             })->middleware('auth:api')->name('like');

//             Route::get('posts/{post}/unlike', function (Request $request, Post $post) {
//                 Auth::user()->liked_posts()->detach($post);
//                 return json_encode(['ok' => true]);
//             })->middleware('auth:api')->name('unlike');

//             Route::post('posts', 'PostController@store')->name('store');

//         });

//         Route::name('comment.')->group(function() {

//             Route::get('comments/{comment}', function (Request $request, Comment $comment) {
//                 return new CommentResource($comment);
//             })->name('get');

//             Route::post('comments/get', function (Request $request) {
//                 $comments = collect([]);
//                 if ($request->input('comments_ids'))
//                 {
//                     foreach ($request->input('comments_ids') as $comment_id) {
//                         $comments->push(Comment::find($comment_id));
//                     }
//                 }
//                 return CommentResource::collection($comments);
//             })->name('getMany');

//             Route::post('comments', 'CommentController@store')->name('store')->middleware('auth:api');

//         });

//         Route::get('search/{search}', 'SearchController@index')->where('search', '.*')->name('search');

//         Route::get('badges/search/{search}', 'SearchController@badges')->where('search', '.*')->name('badges.search');

//         Route::get('tags/search/{search}', 'SearchController@tags')->where('search', '.*')->name('tags.search');

//         Route::post('feed', 'FeedController@load')->name('feed');

//     });

// });
