<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $techno = factory(App\Models\Technology::class, 15)->create();

        $users = factory(App\User::class, 50)->create()->each(function ($user) use ($techno){
            $project = factory(App\Models\Project::class)->make();
            $user->owned_project()->save($project);
            $project->technologies()->attach($techno->random(3));

            $posts = factory(App\Models\Post::class, 2)->make([
                'author_id' => $user->id
            ]);
            $project->posts()->saveMany($posts);
        });

        $tags = factory(App\Models\Tag::class, 25)->create();

        $users->each(function ($user) use ($tags, $techno) {
            $posts = factory(App\Models\Post::class, 2)->make();
            $user->posts()->saveMany($posts);

            $posts->each(function ($post) use ($tags) {
                $post->tags()->attach($tags->random(3));
            });
        });

        $projects = Project::all();
        $projects->each(function ($project) use ($users) {
            $project->members()->attach($users->random(5)->pluck('id'));
        });
    }
}
