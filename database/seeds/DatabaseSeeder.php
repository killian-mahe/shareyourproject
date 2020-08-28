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

        $tags = factory(App\Models\Tag::class, 25)->create();

        $users->each(function ($user) use ($tags) {
            $posts = factory(App\Models\Post::class, 2)->make();
            $user->posts()->saveMany($posts);

            $posts->each(function ($post) use ($tags) {
                $post->tags()->attach($tags->random(3));
            });
        });
    }
}
