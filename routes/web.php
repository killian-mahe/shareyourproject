<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');

Route::resource('projects', 'ProjectController');

Route::resource('users', 'UserController')->except([
    'create', 'store'
]);

Route::resource('comments', 'CommentController')->only([
    'store', 'update', 'destroy'
]);

Route::name('projects.')->prefix('projects')->group(function () {
    Route::get('{project}/members', 'ProjectController@members')->name('members');
    Route::get('{project}/about', 'ProjectController@about')->name('about');
});

Route::name('admin.')->prefix('admin')->group(function() {

    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');

});
