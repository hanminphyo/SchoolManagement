<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {

        $teachers = Teacher::all();
        return view('teachers.index', ['teachers' => $teachers]);
    }

    public function create()
    {
        $courses = Course::all();
        // dd($courses);
        return view('students.create', ['courses' => $courses]);
    }
}
