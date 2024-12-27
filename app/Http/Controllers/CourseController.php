<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', ['courses' => $courses]);
    }

    public function create()
    {
        $courses = Course::all();
        return view('courses.create', ['courses' => $courses]);
    }

    public function show($id)
    {
        $course = Course::find($id);
        return view('courses.show', ['course' => $course]);
    }

    public function destroy($id)
    {

        $course = Course::find($id);
        $course->delete();
        return redirect('/courses');
    }

    public function store()
    {
        $validator = validator(request()->all(), [
            'course_name' => 'required',
            'course_fee' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $course = new Course();
        $course->name = request()->course_name;
        $course->fee = request()->course_fee;
        $course->save();
        return redirect('/courses')->with('info', 'A course has been created!');
    }

    public function edit($id)
    {
        $course = Course::find($id);
        return view('courses.edit')->with('course', $course);
    }

    public function  update($id)
    {
        $validator = validator(
            request()->all(),
            [
                'name' => 'required',
                'fee' => 'required',
            ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $course = Course::find($id);
        $course->name = request()->course_name;
        $course->fee = request()->course_fee;
        $course->save();
        return redirect('/courses')->with('info', 'A Course has been Update');
    }
}
