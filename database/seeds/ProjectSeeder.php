<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Project::class, 25)->state('withOwner')->create()->each(function ($project) {
            $project->posts()->saveMany(factory(App\Models\Post::class, 20)->state('withAuthor')->make());
        });
    }
}
