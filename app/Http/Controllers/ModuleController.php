<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(){
        $users = User::all();
        $modules = Module::inRandomOrder()->paginate(8);
        $category = Module::with('category')->get(); 
        return view('user.module',compact('users','modules','category'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'module_name' => 'required|string|max:255',
            'module_desc' => 'required|string',
            'completion' => 'required|boolean',
            'userID' => 'required|exists:users,userID', 
        ]);

        Module::create([
            'module_name' => $request->module_name,
            'module_desc' => $request->module_desc,
            'completion' => $request->completion,
            'userID' => $request->userID,
        ]);

        return redirect()->back()->with('success', 'Module added successfully!');
    }

    public function edit($moduleID)
    {
        $module = Module::findOrFail($moduleID);
        return response()->json($module);
    }

    public function update(Request $request, $moduleID)
    {
        $request->validate([
            'module_name' => 'required|string|max:255',
            'module_desc' => 'required|string',
            'completion' => 'required|boolean',
        ]);

        $module = Module::findOrFail($moduleID);
        $module->update([
            'module_name' => $request->module_name,
            'module_desc' => $request->module_desc,
            'completion' => $request->completion,
        ]);

        return redirect()->back()->with('success', 'Module updated successfully!');
    }

    public function delete($moduleID)
    {
        $module = Module::findOrFail($moduleID);
        $module->delete();

        return redirect()->back()->with('success', 'Module deleted successfully!');
    }

    // Category
    // public function category($categoryID)
    // {
    //     $category = Category::where('categoryID', $categoryID)->get();
    //     return view('category.books', compact('categoryID'));
    // }
}
