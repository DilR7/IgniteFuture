<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Content;
use App\Models\Module;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->take(3)->get();
        $modules = Module::with('category')->latest()->take(3)->get();
        $admincontent = Content::with('module')->latest()->take(3)->get();
        $quiz = Quiz::with('module')->latest()->take(3)->get();
        $users = User::where('role', 'user')->latest()->take(3)->get();
        $adminbook = Book::latest()->take(3)->get();

        return view('admin.dashboard', compact('modules', 'admincontent','quiz','users','adminbook','categories'));
    }

    public function viewContent()
    {
        $modules = Module::all();
        $admincontent = Content::with('module')->get();  
        return view('admin.admincontent', compact('admincontent', 'modules')); 
    }

    public function viewModule()
    {
        $categories = Category::all();
        $modules = Module::with('category')->get(); 
        return view('admin.module', compact('modules', 'categories')); 
    }

    public function viewQuiz()
    {
        $modules = Module::all();
        $quiz = Quiz::with('module')->get();
        return view('admin.adminquiz', compact('quiz', 'modules')); 
    }

    public function viewUser()
    {
        $users = User::all()->where('role', 'user');
        return view('admin.manageuser', compact('users')); 
    }

    // Book
    public function viewBook()
    {
        $adminbook = Book::all();  
        return view('admin.adminbook', compact('adminbook')); 
    }

    public function BookCreate()
    {
        $modules = Module::all(); 
        return view('adminbook.create', compact('modules'));
    }

    public function postBook(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:books,slug|max:255',
            'desc' => 'required|string',
            'content' => 'required|string',
            'module_id' => 'required|exists:modules,id', 
        ]);

        Book::create($validated);

        return redirect()->route('adminbook')->with('success', 'Book created successfully!');
    }

}


