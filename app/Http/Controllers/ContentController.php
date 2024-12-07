<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Content;
use App\Models\Category;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    public function index($slug)
    {
        $user = Auth::user();
        $module = Module::where('slug', $slug)->firstOrFail();
        $contents = Content::where('module_id', $module->id)->get();
        
        $mainContent = $contents->first();

        $alreadyEnrolled = Enrollment::where('user_id', $user->id)->where('module_id', $module->id)->exists();

        if(!$alreadyEnrolled)
        {
            Enrollment::insert([
                'user_id' => $user->id,
                'module_id' => $module->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $listCourse = Module::whereIn('id', Enrollment::where('user_id', $user->id)->pluck('module_id'))
                            ->withCount('contents')
                            ->get();

        $relatedModule = Module::whereIn('category_id', Category::pluck('id'))
                        ->inRandomOrder()
                        ->withCount('contents')
                        ->take(2)
                        ->get();
                        
        return view('user.content', compact('module', 'contents','mainContent','listCourse','relatedModule','user'));
    }

    public function otherContent($slug)
    {
        $user = Auth::user();
        $mainContent = Content::where('slug', $slug)->firstOrFail();
        $module = Module::where('id', $mainContent->module_id)->get();

        $contents = Content::where('module_id', $mainContent->module_id)->get();
        $listCourse = Module::whereIn('id', Enrollment::where('user_id', $user->id)->pluck('module_id'))
                            ->withCount('contents')
                            ->get();

        $relatedModule = Module::whereIn('category_id', Category::pluck('id'))
        ->inRandomOrder()
        ->withCount('contents')
        ->take(2)
        ->get();
        return view('user.content', compact('mainContent', 'module', 'contents','listCourse','relatedModule','user'));
    }
    public function myContent($module_id)
    {
        $user = Auth::user();

        $module = Module::findOrFail($module_id);

        $contents = Content::where('module_id', $module->id)->get();
        $mainContent = $contents->first();

        $listCourse = Module::whereIn('id', Enrollment::where('user_id', $user->id)->pluck('module_id'))
                        ->withCount('contents')
                        ->get();

                        $relatedModule = Module::whereIn('category_id', Category::pluck('id'))
                        ->inRandomOrder()
                        ->withCount('contents')
                        ->take(2)
                        ->get();

        return view('user.content', compact('mainContent', 'module', 'contents', 'listCourse','relatedModule','user'));
    }

    public function markAsWatched($id)
{
    $userId = Auth::id();

    $existingRecord = DB::table('content_user')
        ->where('user_id', $userId)
        ->where('content_id', $id)
        ->first();

    if ($existingRecord) {
        DB::table('content_user')
            ->where('user_id', $userId)
            ->where('content_id', $id)
            ->update(['completed' => true, 'updated_at' => now()]);
    } else {
        DB::table('content_user')->insert([
            'user_id' => $userId,
            'content_id' => $id,
            'completed' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    return response()->json(['message' => 'Content marked as watched successfully!']);
}


    public function show($contentID)
    {
        $content = Content::findOrFail($contentID);
        return view('testing.contentshow', compact('content'));
    }
}
