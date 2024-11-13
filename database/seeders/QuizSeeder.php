<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Quiz;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = Module::all();

        foreach($modules as $module)
        {
            for($i = 1; $i <= 5; $i++)
            {
                $title = fake()->text(6);
                Quiz::create([
                    'title' => $title,
                    'desc' => fake()->paragraph(),
                    'score' => 0, 
                    'slug' => Str::slug($title),
                    'module_id' => $module->id,
                ]);
            }
        }
    }
}
