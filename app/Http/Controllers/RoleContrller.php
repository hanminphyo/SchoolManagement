<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleContrller extends Controller
{
    public function index()
    {

        // $roles = [
        //     ['id' => 1, 'name' => 'Admin'],
        //     ['id' => 2, 'name' => 'Teacher'],
        //     ['id' => 3, 'name' => 'Student'],
        // ];

        $roles = Role::all();
        return view('roles.index', ['roles' => $roles]);
    }
}
