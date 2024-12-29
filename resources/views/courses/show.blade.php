@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-2">Course List</h1>
        <a class="icon-link icon-link-hover" href="{{ url('/courses') }}">
            <i class="bi bi-arrow-left"></i>
            Go Back
        </a>
        <div class="container mt-4">
            <label class="fs-5 fw-bold">Course Name</label>
            <input type="text" name="course_name" class="form-control" value="{{ $course->name }}" readonly>
            <br />
            <label class="fs-5 fw-bold">Fee</label>
            <input type="text" name="course_fee" class="form-control" value="{{ $course->fee }}" readonly>
            <br />
        </div>
    </div>
@endsection
