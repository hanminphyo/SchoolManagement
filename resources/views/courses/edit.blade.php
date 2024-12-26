@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ url('/courses') }}" method="post">
            @csrf
            <label>Course Name</label>
            <input type="text" name="course_name" class="form-control" value="{{ $course->name }}">
            <br />
            <label>Fee</label>
            <input type="text" name="course_fee" class="form-control" value="{{ $course->fee }}">
            <br />
            <button class="btn btn-primary" type="submit">Update</button>
        </form>
    </div>
@endsection
