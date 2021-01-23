<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Entities\Emotion::class, function (Faker $faker) {
    return [
        "emotionable_id" => \Illuminate\Support\Facades\DB::table("comments")->orderBy("id", "desc")->first()->id,
        "emotion_type" => EMOTIONS_TYPES["comment"],
        "user_id" => null,
    ];
});
