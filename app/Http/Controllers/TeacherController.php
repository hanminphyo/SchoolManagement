<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $teachers = Teacher::paginate(2);
        $courses = Course::all();
        return view('teachers.index')->with('teachers', $teachers)->with('coursers', $courses);
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
        $image_path = 'teachers/' . $teacher->image;
        // dd($image_path);
        if ($teacher->image && Storage::disk('public')->exists($image_path)) {
            Storage::disk('public')->delete($image_path);
        }
        $teacher->delete();
        return redirect('/teachers')->with('info', "'$teacherName'  has been Deleted");
    }

    public function store(Request $request)
    {

        $validator = validator(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'course_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $teacher = new Teacher();
        $teacher->name = request()->name;
        $teacherName = $teacher->name;
        $teacher->email = request()->email;
        $teacher->course_id = request()->course_id;

        if (request()->hasFile('image')) {
            $newImage = $request->file('image');
            $newImageName = time() . '.' . $newImage->getClientOriginalExtension();
            $oldImage = 'teachers/' . $teacher->image;
            if ($teacher->image && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
            $newImage->storeAs('teachers', $newImageName, 'public');
            $teacher->image = $newImageName;
        }
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
    public function update(Request $request, $id)
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'course_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $teacher = Teacher::find($id);
        $teacher->name = request()->name;
        $teacherName = $teacher->name;
        $teacher->email = request()->email;
        $teacher->course_id = request()->course_id;

        if (request()->hasFile('image')) {
            $newImage = $request->file('image');
            $newImageName = time() . '.' . $newImage->getClientOriginalExtension();
            $oldImage = 'teachers/' . $teacher->image;
            if ($teacher->image && Storage::disk('public')->exists($oldImage)) {
                Storage::disk('public')->delete($oldImage);
            }
            $newImage->storeAs('teachers', $newImageName, 'public');
            $teacher->image = $newImageName;
        }
        $teacher->save();
        return redirect('/teachers')->with('info', "'$teacherName' has been Update");
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $teachers = Teacher::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->orWhereHas('course', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->paginate(2);
        return view('teachers.index')->with(['teachers' => $teachers, 'query' => $query]);
    }
}
