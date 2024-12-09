<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Module;
use App\Models\Category;
use App\Models\Question;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $modules = Module::all();
        $categories = Category::all();
        $quizzes = Quiz::paginate(6);
        $isAllQuiz = true;
        $selectedCategory = "All Category";
        $query = $request->input('query');
        if ($query) {
            $quizzes->where('title', 'LIKE', '%' . $query . '%')
                  ->orWhere('desc', 'LIKE', '%' . $query . '%');
        }
        return view('user.quiz',compact('modules','quizzes','categories','user','isAllQuiz','selectedCategory'))->with('isAllQuiz', true);
    }

    public function quizCategory($slug){
        $user = Auth::user();
        $category = Category::where('slug', $slug)->firstOrFail(); 
        $quizzes = Quiz::whereHas('module', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })->paginate(6);
        $categories = Category::all();
        $isAllQuiz = false;
        $selectedCategory = $category->name;
        return view('user.quiz', compact('user','quizzes','category','categories', 'isAllQuiz','selectedCategory'))->with('isAllQuiz', true);;
    }

    public function quizStart($id){
        $user = Auth::user();
        $quizzes = Quiz::findOrFail($id);
        $modules = Module::all();
        $achievements = Achievement::all();
        return view('user.start', compact('modules', 'quizzes','user','achievements'))->with('isAllQuiz', false);
    }
}
