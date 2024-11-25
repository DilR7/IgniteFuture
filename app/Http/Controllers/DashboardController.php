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
        return view('admin.adminbookcreate', compact('modules'));
    }

    public function postBook(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'content' => 'required|string',
            'module_id' => 'required|exists:modules,id', 
        ]);

        Book::insert([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ','_',$request->name)),
            'desc' => $request->desc,
            'content' =>  $request->content,
            'module_id' => $request->module_id
        ]);

        return redirect()->route('adminbook')->with('success', 'Book created successfully!');
    }

    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('adminbook')->with('success', 'Book deleted successfully!');
    }

}


