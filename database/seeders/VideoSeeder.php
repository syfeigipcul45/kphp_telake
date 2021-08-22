<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::create([
            'author_id' => 1,
            'youtube_link' => 'https://www.youtube.com/watch?v=C4sXBbMLUsQ'
        ]);

        Video::create([
            'author_id' => 1,
            'youtube_link' => 'https://www.youtube.com/watch?v=C4sXBbMLUsQ'
        ]);

        Video::create([
            'author_id' => 1,
            'youtube_link' => 'https://www.youtube.com/watch?v=C4sXBbMLUsQ'
        ]);
    }
}
