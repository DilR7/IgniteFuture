<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Content;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = Module::all();

        foreach($modules as $module)
        {
            for($i = 1; $i <= 3; $i++)
            {
                $name1 = fake()->sentence(2);
                Content::create([
                'name' => $name1,
                'desc' => 'Description for video 1.',
                'slug' => Str::slug($name1),
                'video' => 'videos/ok.mp4', 
                'module_id' => $module->id, 
            ]);
            }
        }
    }
}
