<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('user')->get();
        return view('quizzes.index', compact('quizzes'));
    }

    
    public function create()
    {
        return view('quizzes.create'); 
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
        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully.');
    }

    
    public function edit($quizID)
    {
        $quiz = Quiz::findOrFail($quizID);
        return view('quizzes.edit', compact('quiz'));
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
        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
    }

   
    public function delete($quizID)
    {
        $quiz = Quiz::findOrFail($quizID);
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully.');
    }
}
