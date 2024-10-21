<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = Question::all();

        $answers = [
            [
                'question_text' => 'What is the capital of France?',
                'answers' => [
                    ['answer_text' => 'Berlin', 'is_correct' => false],
                    ['answer_text' => 'Paris', 'is_correct' => true],
                    ['answer_text' => 'Rome', 'is_correct' => false],
                    ['answer_text' => 'Madrid', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'What is 2 + 2?',
                'answers' => [
                    ['answer_text' => '3', 'is_correct' => false],
                    ['answer_text' => '4', 'is_correct' => true],
                    ['answer_text' => '5', 'is_correct' => false],
                    ['answer_text' => '6', 'is_correct' => false],
                ],
            ],
        ];

        foreach ($answers as $answerData) {
            $question = $questions->where('question_text', $answerData['question_text'])->first();

            if ($question) {
                foreach ($answerData['answers'] as $answer) {
                    Answer::create([
                        'questionID' => $question->questionID,
                        'answer_text' => $answer['answer_text'],
                        'is_correct' => $answer['is_correct'],
                    ]);
                }
            }
        }
    }
}
