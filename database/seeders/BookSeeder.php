<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = Module::all();

        for ($i = 0; $i < $modules->count(); $i++) {
            $name = fake()->sentence(4);
            $slug = Str::slug($name);
            Book::create([
                'name' => $name,
                'slug' => $slug,
                'desc' => fake()->paragraph(),
                'content' => 'pdfs/bbri.pdf',
                'module_id' => $modules->random()->id
            ]);
        }
    }
}
