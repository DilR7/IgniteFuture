<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $LIST_CATEGORY = ['Physics', 'Mathematics', 'Biology', 'Art', 'Music', 'History', 'Technology', 'Photograph'];
        $image_index = 1;
        foreach ($LIST_CATEGORY as $CATEGORY) {
            Category::create([
                'name' => $CATEGORY,
                'slug' => Str::slug($CATEGORY),
                'img' => 'imgs/HomePage/' . $image_index . '.png'
            ]);
            $image_index++;
        }
    }
}
