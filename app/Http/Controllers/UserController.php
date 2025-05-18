<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    
    public function create()
    {
        return view('users.create');
    }
    
    public function store(UserRequest $request)
    {
       $data= $request->validated();
        $data['password'] = bcrypt($data['password']);
       $user= User::create($data);
        return redirect()->route('users.index')->with('success', 'user created successfully.');
    }
    
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    
    public function update(UserRequest $request,User $user)
    {
        $data=$request->validated();
    
        $user->update($data);
    
        return redirect()->route('users.index')->with('success', 'user updated successfully.');
    }   
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'user deleted successfully.');
    }
    
}
