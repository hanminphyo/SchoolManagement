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
        <div class="container">
            <form action="{{ url('/groups') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mt-2 mb-3">
                        <label class="fs-5 mb-2">Class Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="col-md-6 mt-2 mb-3">
                        <label class="fs-5 mb-2">Course Name</label>
                        <select name="course_id" class="form-control">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mt-2 mb-3">
                        <label class="fs-5 mb-2">Teacher Name</label>
                        <select name="teacher_id" class="form-control">
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mt-2 mb-3">
                        <label class="fs-5 mt-2">Start Time</label>
                        <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}">
                    </div>
                    <div class="col-md-6 mt-2 mb-3">
                        <label class="fs-5 mb-2">End Time</label>
                        <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}">
                    </div>
                    <div class="col-md-6 mt-2 mb-3">
                        <label class="fs-5 mb-2">Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                    </div>
                    <div class="col-md-6 mt-2 mb-3">
                        <label class="fs-5 mb-2">End Date</label>
                        <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                    </div>
                    <div class="col-md-6 mt-2 mb-3">
                        <label class="fs-5 mb-2">Days</label><br />
                        @foreach (['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                            <label><input type="checkbox" name="days[]" value="{{ $day }}" class="fs-6 mx-1">
                                {{ $day }}</label>
                        @endforeach

                    </div>
                    <div>
                        <button class="btn btn-primary mt-3 mb-3" type="submit"><i
                                class="bi bi-floppy me-1"></i>Create</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
