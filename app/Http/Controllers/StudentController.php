<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Stub;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        // dd($students);
        return view('students.index', ['students' => $students]);
    }
    public function create()
    {
        $courses = Course::all();
        // dd($courses);
        return view('students.create', ['courses' => $courses]);
    }

    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show', ['student' => $student]);
    }
    public function destroy($id)
    {

        $student = Student::find($id);
        $student->delete();
        return redirect('/students');
    }

    public function store()
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'course_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $student = new Student();
        $student->name = request()->name;
        $student->email = request()->email;
        $student->course_id = request()->course_id;
        $student->phone = request()->phone;
        $student->address = request()->address;
        $student->save();
        return redirect('/students')->with('info', 'A Student has been created');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $courses = Course::all();
        // dd($courses);
        return view('students.edit')
            ->with('student', $student)
            ->with('courses', $courses);
    }

    public function update($id)
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'course_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $student = Student::find($id);
        $student->name = request()->name;
        $student->email = request()->email;
        $student->course_id = request()->course_id;
        $student->phone = request()->phone;
        $student->address = request()->address;
        $student->save();
        return redirect('/students')->with('info', 'A Student has been Update');
    }
}
