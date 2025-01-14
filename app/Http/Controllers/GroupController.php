<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {

        $groups = Group::all();
        // dd($groups);
        $teachers = Teacher::all();
        // dd($teachers);
        $courses  = Course::all();
        // dd($courses);
        // $students  = Student::all();
        // dd($students);

        return view('groups.index')
            ->with('groups', $groups)
            ->with('teachers', $teachers)
            ->with('courses', $courses);
        // ->with('students', $students);
    }

    public function create()
    {
        $groups = Group::all();
        $courses = Course::all();
        $teachers = Teacher::all();
        // $students = Student::all();
        return view('groups.create')->with('groups', $groups)->with('courses', $courses)->with('teachers', $teachers);
    }

    public function show($id)
    {
        $group = Group::find($id);
        $teachers = Teacher::all();
        return view('groups.show')->with('group', $group)->with('teachers', $teachers);
    }

    public function store()
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'course_id' => 'required',
            'teacher_id' => 'required',
            'days' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $group = new Group();
        $group->name = request()->name;
        $group->course_id = request()->course_id;
        $group->teacher_id = request()->teacher_id;
        $group->days = implode(', ', request()->days);
        $group->start_time = request()->start_time;
        $group->end_time = request()->end_time;
        $group->start_date = Carbon::createFromFormat('Y-m-d', request()->start_date)->format('d/m/y');
        $group->end_date = Carbon::createFromFormat('Y-m-d', request()->end_date)->format('d/m/y');
        $group->save();
        return redirect('/groups')->with('info', 'A Class has been created');
    }

    public function edit($id)
    {
        $group = Group::find($id);
        $selectedDays = explode(', ', $group->days);
        $courses = Course::all();
        $teachers = Teacher::all();
        return view('groups.edit')
            ->with('group', $group)
            ->with('courses', $courses)
            ->with('teachers', $teachers)
            ->with('selectedDays', $selectedDays);
    }

    public function update($id)
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'course_id' => 'required',
            'teacher_id' => 'required',
            'days' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $group = Group::find($id);
        $group->name = request()->name;
        $group->course_id = request()->course_id;
        $group->teacher_id = request()->teacher_id;
        $group->days = implode(', ', request()->days);
        $group->start_time = request()->start_time;
        $group->end_time = request()->end_time;
        $group->start_date = Carbon::createFromFormat('Y-m-d', request()->start_date)->format('d/m/y');
        $group->end_date = Carbon::createFromFormat('Y-m-d', request()->end_date)->format('d/m/y');
        $group->save();
        return redirect('/groups')->with('info', 'A Class has been updated');
    }

    public function destroy($id)
    {

        $group = Group::find($id);
        $className = $group->name;
        $group->delete();
        return redirect('/groups')->with('info', "'$className' has been Deleted");
    }

    public function storeDays(Request $request)
    {
        $request->validate([
            'days' => 'required|array',
            'days.*' => 'string|in:Mon,Tue,Wed,Thu,Fri,Sat,Sun',
        ]);
        $daysString = implode(', ', $request->days);
        Group::create([
            'days_in_a_week' => $daysString,
        ]);
    }

    public function search(Request $request)
    {
        $teachers = Teacher::all();
        $query = $request->input('query');
        $groups = Group::where('name', 'LIKE', "%{$query}%")
            ->orWhereHas('course', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->get();
        return view('groups.index')->with(['groups' => $groups, 'teachers' => $teachers, 'query' => $query]);
    }
};
