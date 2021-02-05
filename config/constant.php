<?php
// "likes" table
define("LIKES_TYPES", [
    "like" => "like",
    "love" => "love",
    "haha" => "haha",
    "wow" => "wow",
    "sad" => "sad",
    "angry" => "angry",
]);

// [!Important] POLYMORPHISM TYPES
define("POLYMORPHISM_TYPES", [
    "post" => get_class(new \App\Entities\Post()),
    "comment" => get_class(new \App\Entities\Comment()),
]);

define("LENGTH_PAGINATE", 5);
define("ENTITIES_PATH", "App\Entities\\");
define("API_SUCCESS", [
    "success" => true,
    "fail" => false,
]);
