<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Enrollment;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        $listEnrolled = Module::whereIn('id', Enrollment::where('user_id', $user->id)->pluck('module_id'))
                        ->withCount('contents')
                        ->get();
        $achievement = Achievement::whereIn('id', function ($query) use ($user) {
                        $query->select('achievement_id')
                                ->from('user_achievements')
                                ->where('user_id', $user->id);
                        })
                        ->get()
                        ->map(function ($achievement) use ($user) {
                        $count = DB::table('user_achievements')
                                ->where('user_id', $user->id)
                                ->where('achievement_id', $achievement->id)
                                ->count();
                        $achievement->count = $count;
                        return $achievement;
                    });
        return view('user.profile',compact('user','listEnrolled','achievement'));
    }

    public function update(Request $request)
{
    $user = Auth::user();
    $data = $request->only(['name']);

    $request->validate([
        'name' => 'required|string|max:255',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('profile_picture')) {
        if ($user->profile_picture) {
            $user->profile_picture = null; 
        }

        $image = $request->file('profile_picture');
        $base64Image = base64_encode(file_get_contents($image));
        $data['profile_picture'] = $base64Image;
    }

    DB::table('users')->where('id', Auth::id())->update($data);

    return redirect()->back()->with('success', 'Profile updated successfully.');
}

}
