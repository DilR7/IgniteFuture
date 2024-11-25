<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = Question::all();

        foreach ($questions as $question) {
            // Generate four answers for each question
            for ($i = 0; $i < 4; $i++) {
                Answer::create([
                    'question_id' => $question->id,
                    'text' => fake()->word(),
                    'is_correct' => $i === 0, // Mark the first answer as correct for simplicity
                ]);
            }
        }
    }
}
