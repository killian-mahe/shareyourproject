<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {

    }

    /**
     * Get the user
     * @param  \Illuminate\Http\Request  $request
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request, User $user)
    {
        return response()->json(
            status: 200,
            data: new UserResource($user)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, User $user)
    {
        if (Auth::user()->id != $user->id) abort(403);

        $validatedData = $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'title' => ['nullable', 'string'],
            'bio' => ['nullable', 'string', 'max:255']
        ]);

        $user = Auth::user();
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->title = $validatedData['title'];
        if ($validatedData['bio']) $user->bio = $validatedData['bio'];

        $user->save();

        return response()->json(
            status: 200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateAccount(Request $request, User $user)
    {
        if (Auth::user()->id != $user->id) abort(403);

        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['nullable', 'string', 'confirmed'],
            'pseudo' => ['required', 'string']
        ]);

        if ($user->email != $validatedData['email']) {
            if (User::where('email', $validatedData['email'])->exists()) {
                $validatedData = $request->validate([
                    'email' => ['required', 'email', 'unique:users,email']
                ]);
            }
        }

        if ($user->username != $validatedData['pseudo']) {
            if (User::where('username', $validatedData['pseudo'])->exists()) {
                $validatedData = $request->validate([
                    'pseudo' => ['required', 'string', 'unique:users,username']
                ]);
            }
        }

        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->username = $validatedData['pseudo'];

        $user->save();

        return view('user.edit.account', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function updateNotif(Request $request, User $user)
    {
        if (Auth::user()->id != $user->id) abort(403);
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
    public function search(Request $request)
    {
        $query = $request->query('query');
        $users = User::where('first_name', 'like', '%'.$query.'%')
                    ->orWhere('last_name', 'like', '%'.$query.'%')
                    ->orWhere('username', 'like', '%'.$query.'%')
                    ->orWhereRaw(
                        "concat(first_name, ' ', last_name) like '%" . $query . "%' "
                    )->limit(3)->get();

        return response()->json(UserResource::collection($users), 200);
    }
}
