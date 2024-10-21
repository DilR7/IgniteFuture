<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        $users = User::all();
        $modules = Module::with('user')->get(); 
        return view('testing.mains',compact('users','modules'));
    }

    public function edit($userID)
    {
        $users = User::findOrFail($userID);
        return view('testing.mains', compact('users')); 
    }


    public function update(Request $request, $userID)
    {
        $users = User::findOrFail($userID);
        $data = $request->only(['name', 'email']); 


        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $users->update($data);
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password); 
        $users->save();
    
        return response()->json([
            'success' => true,
            'message' => 'User added successfully!',
            'user' => $users
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $users = User::where('name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->get();
        return view('mains', compact('users'));
    }


    public function delete($userID)
    {
        $user = User::find($userID);
        
        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $user->delete();
        return response()->json(['Successful deleted'], 204);
    }
}
