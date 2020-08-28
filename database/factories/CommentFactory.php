<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text(100),
        'author_id' => factory(App\User::class),
        'post_id' => factory(App\Models\Post::class)
    ];
});
