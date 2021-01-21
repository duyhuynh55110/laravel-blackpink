<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use \Illuminate\Support\Facades\Schema;

Schema::disableForeignKeyConstraints();
\App\Entities\Comment::truncate();
Schema::enableForeignKeyConstraints();

$post_id = \App\Entities\Post::first()->id;

$factory->define(\App\Entities\Comment::class, function (Faker $faker) use ($post_id) {
    return [
        "commentable_id" => ($post_id)? $post_id: $faker->uuid,
        "reply_id" => null,
        "title" => $faker->name,
        "content" => $faker->text(50),
    ];
});
