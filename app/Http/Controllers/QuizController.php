<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Module;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index(){
        $modules = Module::all();
        $category = Category::all();
        $quiz = Quiz::inRandomOrder()->paginate(8);
        return view('user.quiz',compact('modules','quiz','category'))->with('isAllQuiz', true);
    }

    public function quizCategory($slug){
        $category = Category::where('slug', $slug)->firstOrFail();
        $modules = Module::Where('category_id', $category->id)->get();
        $quiz = Quiz::Where('module_id', $modules->id)->paginate(8);
        $categories = Category::all();
        return view('user.quiz', compact('categories', 'modules','category','quiz'))->with('isAllQuiz', false);;
    }


    // public function index()
    // {
    //     return view('user.quiz'); // Or the view you want to display
    // }

    public function start()
    {
        return view('user.quizstart'); // Or the view you want to display
    }

    public function quizquestion()
    {
        return view('user.question'); // Or the view you want to display
    }

    // public function index()
    // {
    //     $users = User::all();
    //     $quizzes = Quiz::with('user')->get();
    //     return view('testing.quizzes', compact('quizzes','users'));
    // }
    
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
