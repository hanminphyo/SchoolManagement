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
        <form action="{{ url('/students/' . $student->id) }}" method="post">
            @csrf
            @method('PUT')
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}">
            <br />
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $student->email }}">
            <br />
            <label>Course</label>
            <select name="course_id" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $course_id === $student->$course_id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            <br />
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
            <br />
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="{{ $student->address }}">
            <br />
            <button class="btn btn-success" type="submit">Update</button>
        </form>
    </div>
@endsection
