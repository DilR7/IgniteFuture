<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $colors = [
            'bg-green-100', 
            'bg-blue-100', 
            'bg-yellow-100', 
            'bg-red-100', 
            'bg-purple-100', 
            'bg-orange-100', 
            'bg-gray-100', 
            'bg-teal-100'
        ];

        $categories = Category::all();
        
        foreach ($categories as $index => $category) {
            $category->bgColor = $colors[$index % count($colors)];
        }
        
        $modules = Module::inRandomOrder()->limit(6)->get();
        return view('user.home', compact('categories', 'modules'));
    }
}
