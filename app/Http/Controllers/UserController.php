<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index', 'show', 'search'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.user', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit.profile', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Search a list of user
     *
     * @param \Illuminate\Http\Request $request
     * @param String $string
     * @return \App\Http\Resource\User
     */
    public function search(Request $request, String $query)
    {
        $users = User::where('first_name', 'like', '%'.$query.'%')
                                ->orWhere('last_name', 'like', '%'.$query.'%')
                                ->orWhere('username', 'like', '%'.$query.'%')
                                ->orWhereRaw(
                                    "concat(first_name, ' ', last_name) like '%" . $query . "%' "
                                )->limit(5)->get();

        return response()->json(UserResource::collection($users), 200);
    }
}
