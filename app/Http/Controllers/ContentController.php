<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index($moduleID)
    {
        $contents = Content::where('moduleID', $moduleID)->get();
        return view('testing.content', compact('contents', 'moduleID'));
    }

    public function show($contentID)
    {
        $content = Content::findOrFail($contentID);
        return view('testing.contentshow', compact('content'));
    }
}
