<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        // $users = [
        //     ['id' => 1, 'name' => 'admin1'],
        //     ['id' => 2, 'name' => 'admin2'],
        // ];

        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        $users = User::all();
        return view('users.create', ['users' => $users]);
    }

 
}
