<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class CourseController extends Controller
{
    public function index()
    {
       
        $courses = Course::all();
        return view('courses.index', ['courses' => $courses]);
    }
}
