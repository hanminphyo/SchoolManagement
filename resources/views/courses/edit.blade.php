@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="icon-link icon-link-hover mb-2 mt-3" href="{{ url('/courses') }}">
            <i class="bi bi-arrow-left"></i>
            Back
        </a>
        <h1>Edit Course</h1>
        @if ($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        <form action="{{ url('/courses/' . $course->id) }}" method="post">
            @method('PUT')
            @csrf
            <label class="fs-5">Course Name</label>
            <input type="text" name="name" class="form-control" value="{{ $course->name }}">
            <br />
            <label class="fs-5">Course Outline</label>
            <textarea name="outlines" class="form-control mb-3" id="floatingTextarea2" style="height: 100px">{{ $course->outlines }}</textarea>
            <label class="fs-5">Fee</label>
            <input type="text" name="fee" class="form-control" value="{{ $course->fee }}">
            <br />
            <button class="btn btn-primary" type="submit"><i class="bi bi-floppy me-1"></i>Update</button>
        </form>
    </div>
@endsection
