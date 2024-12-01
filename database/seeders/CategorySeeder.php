<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Physics',
                'image' => 'imgs/1.png',
            ],
            [
                'name' => 'Mathematics',
                'image' => 'imgs/2.png',
            ],
            [
                'name' => 'Biology',
                'image' => 'imgs/3.png',
            ],
            [
                'name' => 'Art',
                'image' => 'imgs/4.png',
            ],
            [
                'name' => 'Music',
                'image' => 'imgs/5.png',
            ],
            [
                'name' => 'History',
                'image' => 'imgs/6.png',
            ],
            [
                'name' => 'Technology',
                'image' => 'imgs/7.png',
            ],
            [
                'name' => 'Photograph',
                'image' => 'imgs/8.png',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'img' => $category['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
