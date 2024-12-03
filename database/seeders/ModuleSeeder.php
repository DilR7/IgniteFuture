<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        foreach($categories as $category)
        {
            for($i = 1; $i <= 2; $i++)
            {
                $name = fake()->sentence(10);
                Module::create([
                    'name' => $name,
                    'desc' => fake()->paragraph(),
                    'slug' => Str::slug($name),
                    'completion' => false,
                    'category_id' => $category->id,
                    'user_id' => 1
                ]);
            }
        }
    }
}
