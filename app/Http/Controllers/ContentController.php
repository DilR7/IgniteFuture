<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function index($slug)
    {
        $module = Module::where('slug', $slug)->firstOrFail();
        $contents = Content::where('module_id', $module->id)->get();
        $modules = Module::all();
        return view('user.content', compact('modules', 'contents','module'));
    }

    public function show($contentID)
    {
        $content = Content::findOrFail($contentID);
        return view('testing.contentshow', compact('content'));
    }
}
