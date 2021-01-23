<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Entities\Like::class, function (Faker $faker) {
    return [
        "user_id" => $faker->uuid,
        "likeable_id" => \App\Entities\Comment::first()->id,
        "likeable_type" => LIKES_LIKEABLE_TYPES["comments"],
        "type" => LIKES_TYPES["like"],
    ];
});
