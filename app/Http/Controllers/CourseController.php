<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $courses = Course::paginate(2);
        $students = Student::all();
        return view('courses.index')->with('courses', $courses)->with('studnets', $students);
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
        $courseName = $course->name;
        $course->delete();
        return redirect('/courses')->with('info', "'$courseName 'has been Delete'");
    }

    public function store()
    {
        $validator = validator(request()->all(), [
            'course_name' => 'required',
            'outlines' => 'required',
            'fee' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $course = new Course();
        $course->name = request()->course_name;
        $courseName = $course->name;
        $course->fee = request()->fee;
        $course->outlines = request()->outlines;
        $course->save();
        return redirect('/courses')->with('info', "' $courseName '  has been created!");
    }

    public function edit($id)
    {
        $course = Course::find($id);
        // dd($course);
        return view('courses.edit')->with('course', $course);
    }

    public function update($id)
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'outlines' => 'required',
            'fee' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $course = Course::find($id);
        $course->name = request()->name;
        $courseName = $course->name;
        $course->fee = request()->fee;
        $course->outlines = request()->outlines;
        $course->save();
        return redirect('/courses')->with('info',  " '$courseName'  has been Updated");
    }

    public function storeOutlines(Request $request)
    {
        $request->validate([
            'outlines' => 'nullable|string|max:500',
        ]);
        $outlineString = implode(', ', $request->outlines);
        Course::create([
            'outlines' => $outlineString,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $courses = Course::where('name', 'like', '%' . $query . '%')
            ->orWhere('outlines', 'like', '%' . $query . '%')
            ->orWhere('fee', 'like', '%' . $query . '%')
            ->paginate(2);
        return view('courses.index', ['courses' => $courses]);
    }
}
