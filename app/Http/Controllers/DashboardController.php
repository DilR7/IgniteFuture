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

    // Show the page to add a new module
    public function addModuleForm()
    {
        $categories = Category::all();
        return view('admin.addmodule', compact('categories'));
    }

    // Store a new module
    public function storeModule(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'slug' => 'required|string|unique:modules,slug|max:255',
            'completion' => 'nullable|integer|min:0|max:100',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required',
        ]);

        Module::create($validated);

        return redirect()->route('adminmodule')->with('success', 'Module added successfully!');
    }

    // Show the page to edit an existing module
    public function editModuleForm($id)
    {
        $module = Module::findOrFail($id);
        $categories = Category::all();
        return view('admin.editmodule', compact('module', 'categories'));
    }

    // Update module
    public function updateModule(Request $request, $id)
    {
        $module = Module::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'slug' => "required|string|unique:modules,slug,{$id}|max:255",
            'completion' => 'nullable|integer|min:0|max:100',
            'category_id' => 'required|exists:categories,id',
        ]);

        $module->update($validated);

        return redirect()->route('adminmodule')->with('success', 'Module updated successfully!');
    }

    // Delete a module
    public function deleteModule($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->route('adminmodule')->with('success', 'Module deleted successfully!');
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

    public function viewBook()
    {
        $adminbook = Book::all();
        return view('admin.adminbook', compact('adminbook'));
    }

    // CreateBook
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

    // EditBook
    public function editBook($id)
    {
        $book = Book::findOrFail($id);
        $modules = Module::all(); // Assuming modules are still relevant for editing
        return view('admin.adminbookedit', compact('book', 'modules'));
    }

    public function updateBook(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'content' => 'required|string',
            'module_id' => 'required|exists:modules,id', 
        ]);

        $book = Book::findOrFail($id);
        $book->update([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '_', $request->name)),
            'desc' => $request->desc,
            'content' => $request->content,
            'module_id' => $request->module_id,
        ]);

        return redirect()->route('adminbook')->with('success', 'Book updated successfully!');
    }

    // Delete
    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('adminbook')->with('success', 'Book deleted successfully!');
    }

    //CreateContent
    public function ContentCreate()
    {
        $modules = Module::all(); // Fetch all modules
        return view('admin.admincontentcreate', compact('modules'));
    }

    public function postContent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'video' => 'required|string',
            'module_id' => 'required|exists:modules,id',
        ]);

        Content::create([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '_', $request->name)),
            'desc' => $request->desc,
            'video' => $request->video,
            'module_id' => $request->module_id,
        ]);

        return redirect()->route('admincontent')->with('success', 'Content created successfully!');
    }

    //EditContent
    public function editContent($id)
    {
        $content = Content::findOrFail($id);
        $modules = Module::all();
        return view('admin.admincontentedit', compact('content', 'modules'));
    }

    public function updateContent(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'video' => 'required|string',
            'module_id' => 'required|exists:modules,id',
        ]);

        $content = Content::findOrFail($id);
        $content->update([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '_', $request->name)),
            'desc' => $request->desc,
            'video' => $request->video,
            'module_id' => $request->module_id,
        ]);

        return redirect()->route('admincontent')->with('success', 'Content updated successfully!');
    }

    // Delete content
    public function deleteContent($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        return redirect()->route('admincontent')->with('success', 'Content deleted successfully!');
    }

}


