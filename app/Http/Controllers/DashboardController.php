<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Group;

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
        $groups = Group::all();

        return view('dashboard.index', compact('courses', 'students', 'teachers', 'groups'));
    }
}
