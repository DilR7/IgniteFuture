<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::create([
            'content_name' => 'Introduction to Video 1',
            'content_desc' => 'Description for video 1.',
            'content_video' => 'videos/ok.mp4', 
            'moduleID' => 1, 
        ]);

        Content::create([
            'content_name' => 'Introduction to Video 2',
            'content_desc' => 'Description for video 2.',
            'content_video' => 'videos/oke.mp4',
            'moduleID' => 1,
        ]);

        Content::create([
            'content_name' => 'Introduction to Video 3',
            'content_desc' => 'Description for video 3.',
            'content_video' => 'videos/okee.mp4',
            'moduleID' => 1,
        ]);
    }
}
