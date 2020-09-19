<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Tag;
use App\Models\Post;
use App\User;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $techno = Technology::factory()->count(15)->create();

        $users = User::factory()->count(50)->create()->each(function ($user) use ($techno){
            $project = Project::factory()->make();
            $user->owned_project()->save($project);
            $project->technologies()->attach($techno->random(3));

            $posts = Post::factory()->count(2)->make([
                'author_id' => $user->id
            ]);
            $project->posts()->saveMany($posts);
        });

        $tags = Tag::factory()->count(25)->create();

        $users->each(function ($user) use ($tags, $techno) {
            $posts = Post::factory()->count(2)->make();
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
