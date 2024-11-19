<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuleAdminController extends Controller
{
    public function create(){
        return view('create');
    }
}
