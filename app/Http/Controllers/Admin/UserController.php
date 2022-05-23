<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users')) ;
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles')) ;
    }
 

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'role_id' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:4',
        ]);
        $request->merge(['password' => bcrypt($request->password)]);
       
        User::create($request->all());
        return back()->with('success', 'User created Successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('roles', 'user')) ;
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|min:2',
            'role_id' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($id)],
        ]);
 
        $user->update($request->all());
        return back()->with('success', 'User updated Successfully');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'User deleted Successfully');
    }
}
