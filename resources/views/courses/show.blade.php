@extends('layouts.app')
@section('content')
    <h1>Courses List</h1>
    <div class="container mt-4">
        <form action="{{ url('/courses/' . $course->id) }}"method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger float-end">Delete</button>
        </form>

        <div class="row">
            <div class="col-6 mx-auto">
                <form action="{{ url('/courses') }}" method="post">
                    @csrf
                    <label>Course Name</label>
                    <input type="text" name="course_name" class="form-control" value="{{ $course->name }}" readonly>
                    <br />
                    <label>Fee</label>
                    <input type="text" name="course_fee" class="form-control" value="{{ $course->fee }}" readonly>
                    <br />
                    <a href="{{ url('/courses/' . $course->id . '/edit') }}" class="btn btn-warning me-3">Edit</a>
                </form>
            </div>
        </div>
    </div>
@endsection
