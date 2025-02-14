@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="icon-link icon-link-hover mb-2 mt-3" href="{{ url('/teachers') }}">
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
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between mt-2">
                    <h1>Edit Teacher</h1>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ url('/teachers/' . $teacher->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <label class="fs-5 mt-2 mb-1">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $teacher->name }}">
                        <label class="fs-5 mt-2 mb-1">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $teacher->email }}">
                        <label class="fs-5 mt-2 mb-1">Course</label>
                        <select name="course_id" class="form-control">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ $course->id == $teacher->course_id ? 'selected' : '' }}>
                                    {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                        <div>
                            <button class="btn btn-primary mb-2  mt-3" type="submit">
                                <i class="bi bi-floppy me-1"></i>Update
                            </button>
                        </div>
                </div>
                <div class="col-md-6">
                    <label class="fs-5 mb-2">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" />
                    @if ($teacher->image)
                        <img src="{{ Storage::url('teachers/' . $teacher->image) }}" class="img-thumbnail" />
                    @else
                        <img src="{{ asset('images/noimage.png ') }}" class="img-thumbnail" />
                    @endif

                </div>
                </form>
            </div>
        </div>
    @endsection
