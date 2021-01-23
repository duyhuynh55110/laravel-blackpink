<?php

use Illuminate\Database\Seeder;

class EmotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\Emotion::class, 100)->create();
    }
}
