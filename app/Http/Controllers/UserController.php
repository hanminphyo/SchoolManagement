<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->with('role')->get();
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function assignRole(Request $request, User $user)
    {
        // dd($request);

        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);
        $user = User::find($request->user_id);
        $user->role_id = $request->role_id;

        $user->save();

        return redirect('/dashboard');
    }
}
