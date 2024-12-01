<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $quizzes = Quiz::all();

        foreach($quizzes as $quiz)
        {
            for($i = 1; $i <= 3; $i++)
            {   $name1 = fake()->sentence(1);
                Question::create([
                    'text' => $name1,
                    'point' => 10,
                    'quiz_id' => $quiz->id 
                ]);
            }
        }
    }
}
