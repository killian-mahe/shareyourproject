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
}
