<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Stub;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
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



    public function store()
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'course_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $student = new Student();
        $student->name = request()->name;
        $studentName = $student->name;
        $student->email = request()->email;
        $student->course_id = request()->course_id;
        $student->phone = request()->phone;
        $student->address = request()->address;
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('students', $image_name, 'public');
            $student->image = $image_name;
        }
        $student->save();
        return redirect('/students')->with('info',  " '$studentName'  has been created");
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $courses = Course::all();
        // dd($courses);
        return view('students.edit')->with('student', $student)->with('courses', $courses);
    }

    public function update($id)
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'course_id' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $student = Student::find($id);
        $student->name = request()->name;
        $studentName = $student->name;
        $student->email = request()->email;
        $student->course_id = request()->course_id;
        $student->phone = request()->phone;
        $student->address = request()->address;

        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('students', $image_name, 'public');
            $student->image = $image_name;
        }

        $student->save();
        return redirect('/students')->with('info',  " '$studentName'  has been Updated");
    }

    public function destroy($id)
    {

        $student = Student::find($id);
        $studentName = $student->name;
        $student->delete();
        return redirect('/students')->with('info', "'$studentName'  has been Deleted");
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $students = Student::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->get();
        return view('students.index')->with(['students' => $students, 'query' => $query]);
    }
    // $query = $request->input('query');
    // $students = Student::where('name', 'LIKE', "%{$query}%")
    //     ->orWhere('email', 'LIKE', "%{$query}%")
    //     // ->orWhere('class', 'LIKE', "%{$query}%")
    //     ->get();
    // // dd($student);
    // return view('students.index')->with(['students' => $students, 'query' => $query]);
}
