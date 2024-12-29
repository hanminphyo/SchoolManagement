@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-2">Teacher List</h1>
        <a class="icon-link icon-link-hover mb-2" href="{{ url('/teachers') }}">
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
        <form action="{{ url('/teachers/' . $teacher->id) }}" method="post">
            @csrf
            @method('PUT')
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $teacher->name }}">
            <br />
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $teacher->email }}">
            <br />
            <label>Course</label>
            <select name="course_id" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $teacher->course_id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            <br />
            <button class="btn btn-success" type="submit">Update</button>
        </form>
    </div>
@endsection
