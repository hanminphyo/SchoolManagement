@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Student List</h1>
        <a class="icon-link icon-link-hover mb-2" href="{{ url('/students') }}">
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
            <form action="{{ url('/students/' . $student->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6 ">
                        <label class="fs-5 mb-2">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $student->name }}">
                    </div>
                    <div class="col-md-6 ">
                        <label class="fs-5 mb-2">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $student->email }}">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="fs-5 mb-2">Course</label>
                        <select name="course_id" class="form-control">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ $course->id == $student->course_id ? 'selected' : '' }}>
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="fs-5 mb-2">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="fs-5 mb-2">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $student->address }}">
                    </div>
                </div>
            </form>
        </div>
        <button class="btn btn-success ms-2 mt-3" type="submit">Update</button>
    </div>
@endsection
