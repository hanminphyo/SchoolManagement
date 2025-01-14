@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="icon-link icon-link-hover mb-2 mt-3" href="{{ url('/teachers') }}">
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
        <form action="{{ url('/teachers') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mt-3">
                    <label class="fs-5">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="col-md-6 mt-3">
                    <label class="fs-5">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="col-md-6 mt-3">
                    <label class="fs-5">Course</label>
                    <select name="course_id" class="form-control">
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="fs-5 ">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>
            </div>
            <button class="btn btn-primary mt-3" type="submit"><i class="bi bi-floppy me-1"></i>Create</button>
        </form>
    </div>
@endsection
