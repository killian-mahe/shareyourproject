<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

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
    return view('app');
})->name('home');

Auth::routes(['verify' => true]);

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Route::get('/email/verify', function () {
//     return view('auth.verify');
// })->middleware(['auth'])->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect()->route('home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('status', 'verification-link-sent');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Route::name('users.settings.')->prefix('users')->group(function () {
//     Route::get('{user}/settings/profile', function(User $user) {
//         return view('user.edit.profile', ['user' => $user]);
//     })->name('profile');

//     Route::get('{user}/settings/account', function(User $user) {
//         return view('user.edit.account', ['user' => $user]);
//     })->name('account');

//     Route::get('{user}/settings/notif', function(User $user) {
//         return view('user.edit.notif', ['user' => $user]);
//     })->name('notif');

//     Route::put('{user}/settings/profile', 'UserController@updateProfile');
//     Route::put('{user}/settings/account', 'UserController@updateAccount');
//     Route::put('{user}/settings/notif', 'UserController@updateNotif');
// });

// Route::name('projects.')->prefix('projects')->group(function () {
//     Route::get('{project}/members', 'ProjectController@members')->name('members');
//     Route::get('{project}/about', 'ProjectController@about')->name('about');
// });

// Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin', 'verified'])->group(function() {

//     Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');

//     Route::name('models.')->prefix('models')->group(function() {

//         Route::get('projects', 'AdminController@projects')->name('projects');

//         Route::get('posts', 'AdminController@posts')->name('posts');

//         Route::get('users', 'AdminController@users')->name('users');

//         Route::get('tags', 'AdminController@tags')->name('tags');

//         Route::get('technologies', 'AdminController@technologies')->name('technologies');

//     });

// });
