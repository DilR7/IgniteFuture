<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Content;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
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
                        
        return view('user.content', compact('module', 'contents','mainContent','listCourse','relatedModule'));
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
        return view('user.content', compact('mainContent', 'module', 'contents','listCourse','relatedModule'));
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

        return view('user.content', compact('mainContent', 'module', 'contents', 'listCourse','relatedModule'));
    }


    public function show($contentID)
    {
        $content = Content::findOrFail($contentID);
        return view('testing.contentshow', compact('content'));
    }
}
