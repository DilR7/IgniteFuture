<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::create([
            'module_name' => 'Introduction to Programming',
            'module_desc' => 'A beginner module covering the basics of programming.',
            'completion' => false,
            'userID' => 1,
        ]);

        Module::create([
            'module_name' => 'Advanced Laravel',
            'module_desc' => 'An advanced module for Laravel framework.',
            'completion' => true,
            'userID' => 2, 
        ]);
    }
}
