@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Class List</h1>
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
        <form action="{{ url('/groups/' . $group->id) }}" method="post">
            @method('PUT')
            @csrf
            <label>Course Name</label>
            <select name="course_id" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $group->course_id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            <br />
            <label>Teacher Name</label>
            <select name="teacher_id" class="form-control">
                <option>{{ $group->$teacher->name }}</option>

            </select>
            <br />
            <label>Date</label>
            <input type="date" name="days_in_a_week" class="form-control" value="{{ $group->days_in_a_week }}">
            <br />
            <label>Start Time</label>
            <input type="time" name="start_time" class="form-control" value="{{ $group->start_time }}">
            <br />
            <label>End Time</label>
            <input type="time" name="end_time" class="form-control" value="{{ $group->end_time }}">
            <br />
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ $group->start_date }}">
            <br />
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ $group->end_date }}">
            <br />
            <button class="btn btn-success" type="submit">Update</button>
        </form>
    </div>
@endsection
