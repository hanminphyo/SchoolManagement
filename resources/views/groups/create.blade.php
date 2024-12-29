@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="m-4">Class List</h1>
        <a class="icon-link icon-link-hover mb-2" href="{{ url('/groups') }}">
            <i class="bi bi-arrow-left"></i>
            Go Back
        </a>
        @if ($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        <form action="{{ url('/groups') }}" method="post">
            @csrf
            <label class="fs-5">Course Name</label>
            <select name="course_id" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
            <br />
            <label class="fs-5">Teacher Name</label>
            <select name="teacher_id" class="form-control">
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
            <br />
            <label class="fs-5 mb-2">Date</label><br />
            <label><input type="checkbox" name="days[]" value="Mon" class="fs-6"> Mon</label>
            <label><input type="checkbox" name="days[]" value="Tue" class="fs-6"> Tue</label>
            <label><input type="checkbox" name="days[]" value="Wed" class="fs-6"> Wed</label>
            <label><input type="checkbox" name="days[]" value="Thu" class="fs-6"> Thu</label>
            <label><input type="checkbox" name="days[]" value="Fri" class="fs-6"> Fri</label>
            <label><input type="checkbox" name="days[]" value="Sat" class="fs-6"> Sat</label>
            <label><input type="checkbox" name="days[]" value="Sun" class="fs-6"> Sun</label>
            <br />
            <label class="fs-5 mt-2">Start Time</label>
            <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}">
            <br />
            <label class="fs-5">End Time</label>
            <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}">
            <br />
            <label class="fs-5">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
            <br />
            <label class="fs-5">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
            <br />
            <button class="btn btn-success" type="submit">Create</button>
        </form>
    </div>
@endsection
