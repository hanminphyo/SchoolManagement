<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('teachers.index')->with('teachers', $teachers)->with('courses', $courses);
    }

    public function create()
    {
        $courses = Course::all();
        // dd($courses);
        return view('teachers.create', ['courses' => $courses]);
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);
        return view('teachers.show', ['teacher' => $teacher]);
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacherName = $teacher->name;
        $teacher->delete();
        return redirect('/teachers')->with('info', "'$teacherName'  has been Deleted");
    }

    public function store()
    {

        $validator = validator(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'course_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $teacher = new Teacher();
        $teacher->name = request()->name;
        $teacherName = $teacher->name;
        $teacher->email = request()->email;
        $teacher->course_id = request()->course_id;
        $teacher->save();
        return redirect('/teachers')->with('info', " '$teacherName' has been created");
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $courses = Course::all();
        // dd($courses);
        return view('teachers.edit')->with('teacher', $teacher)->with('courses', $courses);
    }
    public function update($id)
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'course_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $teacher = Teacher::find($id);
        $teacher->name = request()->name;
        $teacherName = $teacher->name;
        $teacher->email = request()->email;
        $teacher->course_id = request()->course_id;
        $teacher->save();
        return redirect('/teachers')->with('info', "'$teacherName' has been Update");
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $teachers = Teacher::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();
        return view('teachers.index')->with(['teachers' => $teachers, 'query' => $query]);
    }
}
