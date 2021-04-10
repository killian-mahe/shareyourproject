<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCollection;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Project;
use App\Http\Resources\Project as ProjectResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Instantiate a new ProjectController instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get a project
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request, Project $project)
    {
        return response()->json(
            status: 200,
            data: new ProjectResource($project)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required ', 'min:10', 'max:200'],
            'collaborators' => ['array', 'exists:users,id'],
            'badges' => ['array', 'exists:technologies,id'],
            'tags' => ['array'],
            'status' => ['required'],
            'start_date' => ['nullable', 'date'],
            'finished_date' => ['nullable', 'date'],
        ]);

        $project = new Project;
        $project->name = $validatedData['name'];
        $project->owner()->associate(Auth::user());
        $project->description = $validatedData['description'];
        $project->status = $validatedData['status'];
        $project->started_at = $validatedData['start_date'];
        $project->finished_at = $validatedData['finished_date'];
        $project->save();

        if ($request->exists('collaborators')) {
            $project->members()->attach($validatedData['collaborators']);
            $project->members()->attach(Auth::user()->id);
        }

        if ($request->exists('badges')) {
            $project->technologies()->attach($validatedData['badges']);
        }

        // Tags

        if ($request->exists('tags')) {
            $existingTags = Tag::find($validatedData['tags']);
            $tags = $existingTags->map(function ($item) {
                return $item->name;
            });

            $missingTags = collect($validatedData['tags'])->diff($tags);
            foreach ($missingTags as $key => $value) {
                $tags->push(Tag::create(['name' => $value])->name);
            }
            $project->tags()->attach($tags);
        }

        return redirect()->route('projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    /**
     * Search a list of project
     */
    public function search(Request $request)
    {
        $query = $request->query('query');
        $projects = Project::where('name', 'like', '%'.$query.'%')
                            ->limit(3)->get();
        return response()->json(
            data: ProjectResource::collection($projects),
            status: 200
        );
    }

    /**
     * Get the posts of the project
     */
    public function posts(Request $request, Project $project)
    {
        return new PostCollection($project->posts()->paginate(5));
    }
}
