<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Point;
use App\Models\Module;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function index(){
        $user = Auth::user();
   
        $modules = Module::whereDoesntHave('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->paginate(6);
        $categories = Category::all();
        return view('user.module',compact('modules','categories','user'))->with('isAllCategory', true);
    }

    public function moduleCategory($slug){
        $user = Auth::user();
        $category = Category::where('slug', $slug)->firstOrFail();
        $modules = Module::where('category_id', $category->id)
        ->whereDoesntHave('users', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->paginate(8);
        $categories = Category::all();
        return view('user.module', compact('categories', 'modules','category','user'))->with('isAllCategory', false);;
    }

    public function ranking()
    {
        $user = Auth::user();
        $points = Point::select('user_id', DB::raw('SUM(score) as score'))
        ->groupBy('user_id')
        ->orderBy('score', 'desc')
        ->limit(10)
        ->with('user')
        ->get();
        return view('user.ranking', compact('points','user'));
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
}
