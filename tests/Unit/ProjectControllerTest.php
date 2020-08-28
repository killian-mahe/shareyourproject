<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    /**
     * A basic test for index project route
     *
     * @return void
     */
    public function testListProject()
    {
        $response = $this->get(route('projects.index'));

        $response->assertStatus(200);
        $response->assertViewIs('project.list');
    }

    /**
     * A test for displaying the project create form
     *
     * @return void
     */
    public function testCreateProjectForm()
    {
        $response = $this->get(route('projects.create'));

        $response->assertRedirect(route('login'));

        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('projects.create'));
        $response->assertStatus(200);
        $response->assertViewIs('project.create');
    }

    /**
     * A test for displaying the edit form
     *
     * @return void
     */
    public function testEditProjectForm()
    {
        $user = factory(\App\User::class)->create();
        $project = factory(\App\Models\Project::class)->make();
        $project->owner()->associate($user);
        $project->push();

        $response = $this->get(route('projects.edit', ['project' => $project->id]));
        $response->assertRedirect(route('login'));

        $response = $this->actingAs($user)->get(route('projects.edit', ['project' => $project->id]));
        $response->assertStatus(200);
        $response->assertViewIs('project.edit');
    }

    /**
     * A test for displaying a project
     *
     * @return void
     */
    public function testShowProject()
    {
        $project = factory(\App\Models\Project::class)->state('withOwner')->create();

        $response = $this->get(route('projects.show', ['project' => $project->id]));

        $response->assertStatus(200);
        $response->assertViewIs('project.public');
    }
}
