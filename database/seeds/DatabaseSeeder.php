<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class, 50)->create()->each(function ($user) {
            $user->owned_project()->save(factory(App\Models\Project::class)->make());
        });

        $users->each(function ($user) {
            $posts = factory(App\Models\Post::class, 2)->make()->each(function ($post) {
                $post->tags()->attach(factory(App\Models\Tag::class, 3)->make());
            });
            $user->posts()->saveMany($posts);
        });
    }
}
