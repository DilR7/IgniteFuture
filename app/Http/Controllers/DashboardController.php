<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function module(){
        $users = User::all();
        $modules = Module::inRandomOrder()->paginate(8);
        $categories = Category::all();
        return view('admin.module',compact('users','modules','categories'))->with('isAllCategory', true);
    }
}


