<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
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


