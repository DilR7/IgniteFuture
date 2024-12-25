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

    //ViewDashboard
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











    //ViewModule
    public function viewModule()
    {
        $categories = Category::all();
        $modules = Module::with('category')->get();
        return view('admin.module', compact('modules', 'categories'));
    }

    // ModuleAddpage
    public function addModuleForm()
    {
        $categories = Category::all();
        return view('admin.addmodule', compact('categories'));
    }

    // CreateModule
    public function storeModule(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'completion' => 'nullable|integer|min:0|max:100',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required',
        ]);

        $imgBase64 = null;
        if ($request->hasFile('img')) {
            $imgBase64 = base64_encode(file_get_contents($request->file('img')));
        } 

        Module::create([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ','_',$request->name)),
            'desc' => $request->desc,
            'img' => $imgBase64,
            'completion' => 0,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id
        ]);;

        return redirect()->route('adminmodule')->with('success', 'Module added successfully!');
    }

    // EditPageModule
    public function editModuleForm($id)
    {
        $module = Module::findOrFail($id);
        $categories = Category::all();
        return view('admin.editmodule', compact('module', 'categories'));
    }

    // UpdateModule
    public function updateModule(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'completion' => 'nullable|integer|min:0|max:100',
            'category_id' => 'required|exists:categories,id',
        ]);

        $module = Module::findOrFail($id);
    
        if ($request->hasFile('img')) {
            $newImg = base64_encode(file_get_contents($request->file('img')));
        } else {
            $newImg = $module->img; 
        }

        $module->update([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ','_',$request->name)),
            'desc' => $request->desc,
            'img' => $newImg,
            'completion' => 0,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('adminmodule')->with('success', 'Module updated successfully!');
    }

    // DeleteModule
    public function deleteModule($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->route('adminmodule')->with('success', 'Module deleted successfully!');
    }



















    // ViewContent
    public function viewContent()
    {
        $modules = Module::all();
        $admincontent = Content::with('module')->get();
        return view('admin.admincontent', compact('admincontent', 'modules'));
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













    // ViewBook
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
            'content' => 'required|file|mimes:pdf|max:5120',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'module_id' => 'required|exists:modules,id',
        ]);

        $contentBase64 = null;
        if ($request->hasFile('content')) {
            $contentBase64 = base64_encode(file_get_contents($request->file('content')));
        }

        $imgBase64 = null;
        if ($request->hasFile('img')) {
            $imgBase64 = base64_encode(file_get_contents($request->file('img')));
        } 

        Book::insert([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ','_',$request->name)),
            'desc' => $request->desc,
            'content' =>  $contentBase64,
            'img' => $imgBase64,
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
            'content' => 'nullable|file|mimes:pdf|max:5120',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'module_id' => 'required|exists:modules,id', 
        ]);

        $book = Book::findOrFail($id);

        if ($request->hasFile('content')) {
            $newContent = base64_encode(file_get_contents($request->file('content')));
        } else {
            $newContent = $book->content;
        }
    
        if ($request->hasFile('img')) {
            $newImg = base64_encode(file_get_contents($request->file('img')));
        } else {
            $newImg = $book->img; 
        }

        $book->update([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '_', $request->name)),
            'desc' => $request->desc,
            'content' => $newContent,
            'img' => $newImg,
            'module_id' => $request->module_id,
        ]);

        return redirect()->route('adminbook')->with('success', 'Book updated successfully!');
    }

    // DeleteBook
    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('adminbook')->with('success', 'Book deleted successfully!');
    }


    

 
    
    // ViewQuiz
    public function viewQuiz()
    {
        $modules = Module::all();
        $quiz = Quiz::with('module')->get();
        return view('admin.adminquiz', compact('quiz', 'modules'));
    }

    //CreateQuiz

    public function QuizCreate()
    {
        $modules = Module::all();
        return view('admin.adminquizcreate', compact('modules'));
    }

    public function postQuiz(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'module_id' => 'required|exists:modules,id',
            'questions' => 'required|array',
            'questions.*.text' => 'required|string|max:255',
            'questions.*.point' => 'nullable|integer', // allow point to be nullable or not required
            'questions.*.answers' => 'required|array',
            'questions.*.answers.*.text' => 'required|string|max:255',
            'questions.*.answers.*.is_correct' => 'required|boolean',
        ]);

        $imgBase64 = null;
            if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $imgBase64 = base64_encode(file_get_contents($request->file('img')));
            }

        $quiz = Quiz::create([
            'title' => $request->title,
            'slug' => strtolower(str_replace(' ', '_', $request->title)),
            'desc' => $request->desc,
            'img' => $imgBase64,
            'module_id' => $request->module_id,
        ]);

        foreach ($request->questions as $questionData) {
            $question = $quiz->questions()->create([
                'text' => $questionData['text'],
                'point' => $questionData['point'] ?? null,  
            ]);

            if (isset($questionData['answers'])) {
                foreach ($questionData['answers'] as $answerData) {
                    $question->answers()->create([
                        'text' => $answerData['text'],
                        'is_correct' => $answerData['is_correct'] ?? false,
                    ]);
                }
            }
        }

        return redirect()->route('adminquiz')->with('success', 'Quiz created successfully.');
    }

    // Edit Quiz
    public function editQuiz($id)
    {
        $quiz = Quiz::with('questions.answers')->findOrFail($id);
        $modules = Module::all();
        return view('admin.adminquizedit', compact('quiz', 'modules'));
    }

    public function updateQuiz(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
            'module_id' => 'required|exists:modules,id',
            'questions' => 'required|array',
            'questions.*.text' => 'required|string|max:255',
            'questions.*.point' => 'nullable|integer', 
            'questions.*.answers' => 'required|array',
            'questions.*.answers.*.text' => 'required|string|max:255',
            'questions.*.answers.*.is_correct' => 'boolean',
        ]);

        $quiz = Quiz::findOrFail($id);

        if ($request->hasFile('img')) {
            $newImg = base64_encode(file_get_contents($request->file('img')));
        } else {
            $newImg = $quiz->img;
        }

        $quiz->update([
            'title' => $request->title,
            'slug' => strtolower(str_replace(' ', '_', $request->title)),
            'desc' => $request->desc,
            'img' => $newImg,
            'module_id' => $request->module_id,
        ]);

        foreach ($request->questions as $questionData) {
            $question = $quiz->questions()->find($questionData['id']);
            
            if ($question) {
                $question->update([
                    'text' => $questionData['text'],
                    'point' => $questionData['point'] ?? null,
                ]);
            } else {
                $question = $quiz->questions()->create([
                    'text' => $questionData['text'],
                    'point' => $questionData['point'] ?? null,
                ]);
            }

            foreach ($questionData['answers'] as $answerData) {
                $answer = $question->answers()->find($answerData['id']);
                if ($answer) {
                    $answer->update([
                        'text' => $answerData['text'],
                        'is_correct' => $answerData['is_correct'] ?? false,
                    ]);
                } else {
                    $question->answers()->create([
                        'text' => $answerData['text'],
                        'is_correct' => $answerData['is_correct'] ?? false,
                    ]);
                }
            }
        }

        return redirect()->route('adminquiz')->with('success', 'Quiz updated successfully.');
    }

    public function deleteQuiz($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('adminquiz')->with('success', 'Quiz deleted successfully.');
    }














    //ViewUser
    public function viewUser()
    {
        $users = User::all()->where('role', 'user');
        return view('admin.manageuser', compact('users'));
    }

    
}