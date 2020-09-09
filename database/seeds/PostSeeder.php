<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('posts')->insert([
            [
                'author_id' => 1,
                'title' => "BLACKPINK Breaks YouTube Record As \"How You Like That\" MV Hits 450 Million Views",
                'image' => 'https://6.viki.io/image/48cab11a44224677a1f498e60a2f5821.jpeg?s=900x600&e=t',
                'slug' => ucwords(str_replace('-', ' ', "BLACKPINK Breaks YouTube Record As \"How You Like That\" MV Hits 450 Million Views")),
                'content' => "On August 23 at approximately 1:25 a.m. KST, BLACKPINK’s music video for “How You Like That” surpassed 450 million views in record time. The song was originally released on June 26 at 6 p.m. KST, meaning that it took the video just over 57 days and 7 hours to reach the milestone.",
            ],
            [
                'author_id' => 1,
                'title' => "BLACKPINK’s \"As If It’s Your Last\" Becomes Their 4th MV To Surpass 850 Million Views",
                'image' => 'https://6.viki.io/image/8491ce409caf432b9d8878903af19308.jpeg?s=900x600&e=t',
                'slug' => ucwords(str_replace('-', ' ', "BLACKPINK’s \"As If It’s Your Last\" Becomes Their 4th MV To Surpass 850 Million Views")),
                'content' => "On August 22 at approximately 2:34 p.m. KST, the music video for BLACKPINK’s “As If It’s Your Last” surpassed 850 million views on YouTube. The music video was released on June 22, 2017, meaning that they achieved the feat in approximately three years and two months.",
            ],
            [
                'author_id' => 1,
                'title' => "BLACKPINK, Selena Gomez to serve up ‘Ice Cream’ on Aug. 28",
                'image' => 'https://mb.com.ph/wp-content/uploads/2020/08/BP2_HIRES.jpg',
                'slug' => ucwords(str_replace('-', ' ', "BLACKPINK, Selena Gomez to serve up 'Ice Cream' on Aug. 28")),
                'content' => "K-pop girl group BLACKPINK revealed the title of their upcoming song that they have collaborated with singer and actress Selena Gomez.

In a post on Twitter, the quartet unveiled that the title is “Ice Cream,” which will drop at 1 p.m. KST (noon in the Philippines) on Aug. 28.

“Ice Cream @blackpinkofficial. SELPINK IN YOUR AREA soon… August 28,” Gomez posted on Instagram on Aug. 21 when the song’s title was finally disclosed.

BLACKPINK member Jennie previously wrote “You’re gna melt” together with an ice cream emoji before the name of the song was revealed.

YG Entertainment revealed on Aug. 12 that Gomez will be the featured artist in BLACKPINK’s new song.

YG Entertainment earlier said that “BLACKPINK’s worldwide comeback preparation is going smoothly. The four members, Jisoo, Jennie, Rosé and Lisa, are currently on their final comeback preparation process after completing their MV [music video] shooting.”

It described “Ice Cream” as “very cool, which will go well with the hot summer. Unlike the swag and female warrior-like images BLACKPINK has presented through music based on hip-hop, their upcoming single contains more of their fresh and lovely charms,” according to YG blog.

“Ice Cream” will be BLACKPINK’s second single since releasing “How You Like That” last June 26.

The music video for “How You Like That” achieved success. YouTube previously told Bulletin Entertainment the MV became the No. 1 most viewed music video in the first 24 hours of release with 86.3 million views and it set an all-time record for the biggest YouTube Premiere with 1.66 million peak concurrent viewers.",
            ],
        ]);
    }
}
