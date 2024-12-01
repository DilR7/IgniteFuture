<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Module;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index(){
        $user = Auth::user();
        $modules = Module::all();
        $categories = Category::all();
        $quizzes = Quiz::inRandomOrder()->paginate(8);
        return view('user.quiz',compact('modules','quizzes','categories','user'))->with('isAllQuiz', true);
    }

    public function quizCategory($slug){
        $user = Auth::user();
        $category = Category::where('slug', $slug)->firstOrFail(); 
        $quizzes = Quiz::whereHas('module', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })->paginate(8);
        $categories = Category::all();
        return view('user.quiz', compact('user','quizzes','category','categories'))->with('isAllQuiz', true);;
    }

    public function quizStart($id){
        $user = Auth::user();
        $quizzes = Quiz::findOrFail($id);
        $modules = Module::all();
        $achievements = Achievement::all();
        return view('user.start', compact('modules', 'quizzes','user','achievements'))->with('isAllQuiz', false);
    }
}
