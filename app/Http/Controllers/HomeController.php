<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Course;
use App\Models\Module;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $colors = [
            'bg-blue-100', 
            'bg-green-100', 
            'bg-yellow-100', 
            'bg-red-100', 
            'bg-yellow-100', 
            'bg-purple-100', 
            'bg-gray-100', 
            'bg-green-100'
        ];

        $categories = Category::withCount('modules')->get();
        
        foreach ($categories as $index => $category) {
            $category->bgColor = $colors[$index % count($colors)];
        }

        $user = Auth::user();
        
        $modules = Module::inRandomOrder()->limit(6)->get();

        $top3 =  Point::select('user_id', DB::raw('SUM(score) as score'))
                ->with('user')
                ->groupBy('user_id')
                ->orderBy('score', 'desc')
                ->limit(3)
                ->get();
             
        return view('user.home', compact('categories', 'modules', 'user','top3'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
