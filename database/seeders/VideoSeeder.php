<?php

namespace Database\Seeders;

use App\Models\Media;
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
        for($i = 0; $i < 5; $i++) {
            Media::create([
                'link_media' => 'https://www.youtube.com/watch?v=C4sXBbMLUsQ',
                'caption' => 'Example of video',
                'type' => 'video'
            ]);
        }

        for($i = 0; $i < 5; $i++) {
            Media::create([
                'link_media' => 'https://images.unsplash.com/photo-1593642532871-8b12e02d091c?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1712&q=80',
                'caption' => 'Example of video',
                'type' => 'photo'
            ]);
        }
    }
}
