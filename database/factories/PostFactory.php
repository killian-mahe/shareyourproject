<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'content' => $faker->text($maxNbChars = 255),
    ];
});

$factory->state(Post::class, 'withAuthor', function (Fake $faker) {
    return [
        'author' => factory(App\User::class),
    ];
});
