<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();

        $questions = Question::where('quiz_id', $id)->get();
        $quiz_id = $id;


        foreach ($questions as $question) {
            $question->answers = $question->answers()->get();
        }

        return view('user.question', compact('questions','quiz_id','user'));
    }

    public function submitQuiz(Request $request)
    {
        $answers = $request->input('answers');
        $quiz_id = $request->input('quiz_id');
        $score = 0;

        foreach ($answers as $questionId => $answerId) {
            $answer = Answer::where('id', $answerId)->where('is_correct', true)->first();
            if ($answer) {
                $score += 10;
            }
        }

        $user = Auth::user();

        $existingPoint = Point::where('user_id', $user->id)
                            ->where('quiz_id', $quiz_id)
                            ->first();

        if ($existingPoint) {
            $existingPoint->update(['score' => $score]);
        } else {
            Point::create([
                'user_id' => $user->id,
                'quiz_id' => $quiz_id,
                'score' => $score,
            ]);
        }
        return response()->json(['score' => $score]);
    }
}
