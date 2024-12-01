<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Content;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function enroll($moduleId)
    {
        $user = Auth::user();
        $module = Module::where('id', $moduleId)->firstOrFail();
        $contents = Content::where('module_id', $module->id)->get();
        $mainContent = $contents->first();
        $alreadyEnrolled = Enrollment::where('user_id', $user->id)->where('module_id', $moduleId)->exists();

        if(!$alreadyEnrolled)
        {
            Enrollment::insert([
                'user_id' => $user->id,
                'module_id' => $moduleId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('contents', compact('module','contents','mainContent'))
                         ->with('success', 'You have enrolled in the module!');
    }
}
