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

        foreach ($LIST_CATEGORY as $CATEGORY) {
            Category::create([
                'name' => $CATEGORY,
                'slug' => Str::slug($CATEGORY),
            ]);
        }
    }
}
