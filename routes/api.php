<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TechnologyController;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return new UserResource($request->user());
});

Route::name('feed.')->prefix('feed')->group(function() {
    Route::get('/', [FeedController::class, 'get'])->name('get');
});

Route::name('post.')->prefix('posts')->group(function() {

    Route::middleware('auth:sanctum')->group(function () {
        Route::put('/{post}/like', [PostController::class, 'like'])->name('like');
        Route::put('/{post}/unlike', [PostController::class, 'unlike'])->name('unlike');
        Route::post('/create', [PostController::class, 'create'])->name('create');
    });

});

Route::name('user.')->prefix('users')->group(function() {
    Route::get('/search', [UserController::class, 'search'])->name('search');

    Route::get('/{user}', [UserController::class, 'get'])->name('get');
});

Route::name('project.')->prefix('projects')->group(function() {
    Route::get('/search', [ProjectController::class, 'search'])->name('search');
    Route::get('/{project}', [ProjectController::class, 'get'])->name('get');
    Route::get('/{project}/posts', [ProjectController::class, 'posts'])->name('posts');
    Route::post('/create', [ProjectController::class, 'create'])->name('create');
});

Route::name('badge.')->prefix('badges')->group(function() {
    Route::get('/search', [TechnologyController::class, 'search'])->name('search');
});

Route::name('tag.')->prefix('tags')->group(function() {
    Route::get('/search', [TagController::class, 'search'])->name('search');
});
