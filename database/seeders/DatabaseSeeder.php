<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            ModuleSeeder::class,
            ContentSeeder::class,
            BookSeeder::class,
            QuizSeeder::class,
            // QuizSeeder::class,
            // QuestionSeeder::class,
            // AnswerSeeder::class,
        ]);
    }
}
