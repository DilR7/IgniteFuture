<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $module = Module::all();
        $quizzes = Quiz::with('module')->get();
        return view('testing.quizzes', compact('quizzes','module'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'quiz_desc' => 'required|string',
            'score' => 'required|integer',
            'userID' => 'required|exists:users,userID',
        ]);

        Quiz::create($request->all());
        return redirect()->back()->with('success', 'Quiz createc successfully!');
    }

    
    public function edit($quizID)
    {
        $quizzes = Quiz::findOrFail($quizID);
        return response()->json($quizzes);
    }

 
    public function update(Request $request, $quizID)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'quiz_desc' => 'required|string',
            'score' => 'required|integer',
            'userID' => 'required|exists:users,userID', 
        ]);

        $quiz = Quiz::findOrFail($quizID);
        $quiz->update($request->all());
        return redirect()->back()->with('success', 'Quiz updated successfully!');
    }

   
    public function delete($quizID)
    {
        $quiz = Quiz::findOrFail($quizID);
        $quiz->delete();
        return redirect()->back()->with('success', 'Quiz deleted successfully!');
    }


    public function question($quizID)
    {
        $quiz = Quiz::findOrFail($quizID);
        $questions = Question::with('answers')->where('quizID', $quizID)->get();

        return view('testing.questions', compact('quiz', 'questions'));
    }




}
