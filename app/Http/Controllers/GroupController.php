<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Group;
use App\Models\Teacher;
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

        return view('groups.index')->with('groups', $groups)->with('teachers', $teachers)->with('courses', $courses);
    }

    public function create()
    {
        $courses = Course::all();
        $teachers = Teacher::all();
        return view('groups.create')->with('courses', $courses)->with('teachers', $teachers);
    }

    public function show($id)
    {
        $group = Group::find($id);
        return view('groups.show', ['group' => $group]);
    }

    public function store()
    {
        $validator = validator(request()->all(), [
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
        $group->course_id = request()->course_id;
        $group->teacher_id = request()->teacher_id;
        $group->days_in_a_week = implode(', ', request()->days);
        $group->start_time = request()->start_time;
        $group->end_time = request()->end_time;
        $group->start_date = request()->start_date;
        $group->end_date = request()->end_date;
        $group->save();
        return redirect('/groups')->with('info', 'A Class has been created');
    }


    public function storeDays(Request $request)
    {
        $request->validate([
            'days' => 'required|array',
            'days.*' => 'string|in:Mon,Tue,Wed,Thu,Fri,Sat,Sun',
        ]);
        $daysString = implode(', ', $request->days);
        Course::create([
            'days_in_a_week' => $daysString,
        ]);
    }


    public function edit($id)
    {
        $group = Group::find($id);
        $courses = Course::all();
        $teachers = Teacher::all();
        return view('groups.create')
            ->with('group', $group)
            ->with('courses', $courses)
            ->with('teachers', $teachers);
    }

    public function destroy($id)
    {

        $group = Group::find($id);
        $course = Course::find($id);
        $teacher = Teacher::find($id);
        $group->delete();
        return redirect('/groups')->with('info', "A Class has been Deleted");
    }
};
