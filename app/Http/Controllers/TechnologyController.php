<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technology;
use App\Http\Resources\Badge as BadgeResource;

class TechnologyController extends Controller
{
    /**
     * Instantiate a new TechnologyController instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get badges
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\Badge
     */
    public function search(Request $request)
    {
        $query = $request->query('query');
        $technologies = Technology::where('label', 'like', '%'.$query.'%')->limit(5)->get();

        return response()->json(
            data: BadgeResource::collection($technologies),
            status: 200
        );
    }
}
