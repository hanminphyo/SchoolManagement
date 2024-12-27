@extends('layouts.app')
@section('content')
    <div class="container">
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
            <label>Course Name</label>
            <input type="text" name="course_name" class="form-control" value="{{ old('course_name') }}">
            <br />
            <label>Teacher Name</label>
            <input type="text" name="teacher_name" class="form-control" value="{{ old('teacher_name') }}">
            <br />
            <label>Date</label>
            <input type="text" name="days_in_a_week " class="form-control" value="{{ old('days_in_a_week') }}">
            <br />
            <label>Start Time</label>
            <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}">
            <br />
            <label>End Time</label>
            <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}">
            <br />
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
            <br />
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
            <br />
            <button class="btn btn-success" type="submit">Create</button>
        </form>
    </div>
@endsection
