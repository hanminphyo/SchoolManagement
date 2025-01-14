@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="icon-link icon-link-hover mb-2 mt-3" href="{{ url('/groups') }}">
            <i class="bi bi-arrow-left"></i>
            Back
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
            <label class="fs-5 mb-2">Class Name</label>
            <input type="text" name="name" class="form-control" value="{{ $group->name }}">

            <label class="fs-5 mt-2">Course Name</label>
            <select name="course_id" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $group->course_id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            <br />
            <label class="fs-5 mt-2">Teacher Name</label>
            <select name="teacher_id" class="form-control">
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $teacher->id == $group->teacher_id ? 'selected' : '' }}>
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
            <br />
            <div class="col-md-6 mt-2 mb-3">
                <label class="fs-5 mb-2">Days</label><br />
                {{-- <label>
                    <input type="checkbox" name="days" value="{{ $group->days_in_a_week }}" class="fs-6 mx-1"
                        {{ $group->days_in_a_week ? 'checked' : '' }}> {{ $group->days_in_a_week }}
                </label> --}}
                <label>
                    <input type="checkbox" name="days[]" value="Mon"
                        {{ in_array('Mon', $selectedDays) ? 'checked' : '' }}>
                    Mon
                </label>
                <label>
                    <input type="checkbox" name="days[]" value="Tue"
                        {{ in_array('Tue', $selectedDays) ? 'checked' : '' }}>
                    Tue
                </label>
                <label>
                    <input type="checkbox" name="days[]" value="Wed"
                        {{ in_array('Wed', $selectedDays) ? 'checked' : '' }}>
                    Wed
                </label>
                <label>
                    <input type="checkbox" name="days[]" value="Thu"
                        {{ in_array('Thu', $selectedDays) ? 'checked' : '' }}>
                    Thu
                </label>
                <label>
                    <input type="checkbox" name="days[]" value="Fri"
                        {{ in_array('Fri', $selectedDays) ? 'checked' : '' }}>
                    Fri
                </label>
                <label>
                    <input type="checkbox" name="days[]" value="Sat"
                        {{ in_array('Sat', $selectedDays) ? 'checked' : '' }}>
                    Sat
                </label>
                <label>
                    <input type="checkbox" name="days[]" value="Sun"
                        {{ in_array('Sun', $selectedDays) ? 'checked' : '' }}>
                    Sun
                </label>
            </div>
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
            <button type="submit" class="btn btn-primary mt-1 mb-2"><i class="bi bi-file-earmark-arrow-up-fill"></i>
                Update</button>
        </form>
    </div>
@endsection
