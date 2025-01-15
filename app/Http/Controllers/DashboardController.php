<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Group;
use App\Models\User;
use App\Models\Role;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        $students = Student::all();
        $teachers = Teacher::all();
        $users = User::all();
        $roles = Role::all();
        $groups = Group::all();

        return view('dashboard.index', compact('courses', 'students', 'teachers', 'groups', 'users', 'roles'));
    }

    public function show($id)
    {
        $users = User::all();
        $role = Role::find($id);

        return view('dashboard.show', compact('users', 'role'));
    }
}
