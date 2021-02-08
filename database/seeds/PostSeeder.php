<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\Schema;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Entities\Post::truncate();
        Schema::enableForeignKeyConstraints();

        $faker = Faker\Factory::create('en_EN');
        $resize = '?resize=1359%2C900&quality=90&strip=all&zoom=1&ssl=1'; // https://metro.co.uk/tag/black-pink/

        $posts = [
            [
                'author_id' => $faker->uuid,
                'title' => "Who are the four BLACKPINK members from Lisa to Jennie?",
                'img' => 'https://i2.wp.com/metro.co.uk/wp-content/uploads/2019/04/SEI_58822998.jpg' . $resize,
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => "Will Smith takes selfie with BLACKPINK at Coachella 2019 and declares himself 'an official fan'",
                'img' => 'https://i0.wp.com/metro.co.uk/wp-content/uploads/2019/04/SEC_63550999.jpg' . $resize,
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => "BLACKPINK's Lisa and Rosé spotted out and about in Manchester ahead of Arena gig",
                'img' => 'https://i1.wp.com/metro.co.uk/wp-content/uploads/2019/05/SEC_68692672.jpg' . $resize,
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => "#StayStrongRose: Fans rally around BLACKPINK star Rosé Park after 'unfair treatment' compared to the rest of the band",
                'img' => 'https://i0.wp.com/metro.co.uk/wp-content/uploads/2019/08/PRC_82276221.jpg' . $resize,
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => "Shawn Mendes stans BLACKPINK as he poses with K-Pop stars but Rosé is nowhere to be seen",
                'img' => 'https://i2.wp.com/metro.co.uk/wp-content/uploads/2019/09/PRI_86934698.jpg' . $resize,
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => "Blackpink's Rosé ditches face mask amid Coronavirus outbreak as she heads to Paris",
                'img' => 'https://i0.wp.com/metro.co.uk/wp-content/uploads/2020/02/PRC_141679299.jpg' . $resize,
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => "Lady Gaga announces Chromatica tracklisting with Ariana Grande, BLACKPINK and Elton John set to feature",
                'img' => 'https://i1.wp.com/metro.co.uk/wp-content/uploads/2020/04/PRI_149882439.jpg' . $resize,
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => "BLACKPINK call on fans to name their new reality series ahead of comeback",
                'img' => 'https://i1.wp.com/metro.co.uk/wp-content/uploads/2020/01/PRI_124835752.jpg' . $resize,
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => "BLACKPINK's How You Like That video becomes biggest premiere ever in YouTube history",
                'img' => 'https://i1.wp.com/metro.co.uk/wp-content/uploads/2020/06/Screenshot-2020-06-26-at-11.54.31-6530.png' . $resize,
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => "BLACKPINK smash Jimmy Fallon performance as How You Like That breaks YouTube records",
                'img' => 'https://metro.co.uk/wp-content/uploads/2020/06/PRC_155049036.jpg' . $resize,
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => $faker->title,
                'img' => 'https://i.imgur.com/py7XWlY.jpg',
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => $faker->title,
                'img' => 'https://i.imgur.com/dIuU0A2.jpg',
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => $faker->title,
                'img' => 'https://i.imgur.com/0mZvI84.jpg',
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => $faker->title,
                'img' => 'https://i.imgur.com/DeSArZX.jpg',
                'content' => $faker->randomHtml(),
            ],
            [
                'author_id' => $faker->uuid,
                'title' => $faker->title,
                'img' => 'https://i.imgur.com/5bRw9xB.jpg',
                'content' => $faker->randomHtml(),
            ],
        ];
        foreach ($posts as $post) {
            \App\Entities\Post::create($post);
        }
    }
}
