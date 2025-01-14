@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="icon-link icon-link-hover mb-2" href="{{ url('/students') }}">
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
                    <h1>Edit Student</h1>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <form action="{{ url('/students/' . $student->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
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
                            <option value="{{ $course->id }}" {{ $course->id == $student->course_id ? 'selected' : '' }}>
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                    <label class="fs-5 mb-2">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
                    <label class="fs-5 mb-2">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $student->address }}">
                </div>
                <div class="col-md-6 mt-3">
                    <label class="fs-5 mb-2">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" />
                    <div class="col-4">
                        @if ($student->image)
                            <img src="{{ Storage::url('students/' . $student->image) }}" class="img-thumbnail "
                                style="max-width: 200px; max-height: 200px;" />
                        @else
                            <img src="{{ asset('images/noimage.png ') }}" class="img-thumbnail" />
                        @endif
                    </div>
                </div>
            </div>

            <button class="btn btn-primary  mt-3" type="submit">
                <i class="bi bi-floppy me-1"></i>Update
            </button>
            </form>
        </div>
    </div>
@endsection
