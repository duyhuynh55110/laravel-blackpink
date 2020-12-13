<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('comments')->insert([
            [
                "commentable_id" => 1,
                "reply_id" => null,
                "title" => "FC. Lisa",
                "content" => "She was really great",
            ],
            [
                "commentable_id" => 1,
                "reply_id" => null,
                "title" => "Blink VN",
                "content" => "Blink love you Jennie",
            ],
            [
                "commentable_id" => 1,
                "reply_id" => null,
                "title" => "Love Blackpink",
                "content" => "Try to help 'Kill this love' reach 1 billion views on youtube guys",
            ],
            [
                "commentable_id" => 1,
                "reply_id" => 3,
                "title" => "Love Blackpink",
                "content" => "Agree",
            ],
        ]);
    }
}
