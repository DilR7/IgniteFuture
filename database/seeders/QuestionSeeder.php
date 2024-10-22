<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $quizID = 1;
        $questions = [
            [
                'question_text' => 'What is the capital of France?',
                'question_point' => 10,
                'quizID' => $quizID,
            ],
            [
                'question_text' => 'What is 2 + 2?',
                'question_point' => 5,
                'quizID' => $quizID,
            ],
        ];

        foreach ($questions as $questionData) {
            Question::create($questionData);
        }
    }
}
