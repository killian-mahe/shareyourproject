<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/home', 'FeedController@index')->name('home');

Route::resource('posts', 'PostController');

Route::resource('projects', 'ProjectController');

Route::resource('users', 'UserController')->except([
    'create', 'store', 'edit'
]);

Route::resource('comments', 'CommentController')->only([
    'store', 'update', 'destroy'
]);

Route::name('users.settings.')->prefix('users')->group(function () {
    Route::get('{user}/settings/profile', function() {
        return view('user.edit.profile');
    })->name('profile');

    Route::get('{user}/settings/account', function() {
        return view('user.edit.account');
    })->name('account');

    Route::get('{user}/settings/notif', function() {
        return view('user.edit.notif');
    })->name('notif');
});

Route::name('projects.')->prefix('projects')->group(function () {
    Route::get('{project}/members', 'ProjectController@members')->name('members');
    Route::get('{project}/about', 'ProjectController@about')->name('about');
});

Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin', 'verified'])->group(function() {

    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');

    Route::name('models.')->prefix('models')->group(function() {

        Route::get('projects', 'AdminController@projects')->name('projects');

        Route::get('posts', 'AdminController@posts')->name('posts');

        Route::get('users', 'AdminController@users')->name('users');

        Route::get('tags', 'AdminController@tags')->name('tags');

        Route::get('technologies', 'AdminController@technologies')->name('technologies');

    });

});
