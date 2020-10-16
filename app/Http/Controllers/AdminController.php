<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard
     *
     * @param Illuminate\Http\Request $request
     */
    public function dashboard(Request $request) {
        return view('admin.dashboard');
    }

    /**
     * Display the projects panel
     *
     * @param Illuminate\Http\Request $request
     */
    public function projects(Request $request)
    {
        return view('admin.models.projects');
    }

    /**
     * Display the posts panel
     *
     * @param Illuminate\Http\Request $request
     */
    public function posts(Request $request)
    {
        return view('admin.models.posts');
    }

    /**
     * Display the users panel
     *
     * @param Illuminate\Http\Request $request
     */
    public function users(Request $request)
    {
        return view('admin.models.users');
    }

    /**
     * Display the tags panel
     *
     * @param Illuminate\Http\Request $request
     */
    public function tags(Request $request)
    {
        return view('admin.models.tags');
    }

    /**
     * Display the technologies panel
     *
     * @param Illuminate\Http\Request $request
     */
    public function technologies(Request $request)
    {
        return view('admin.models.technologies');
    }
}
