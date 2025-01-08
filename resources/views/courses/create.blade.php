@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Course List</h1>
        <a class="icon-link icon-link-hover mb-2" href="{{ url('/courses') }}">
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
        <div class="container ">
            <form action="{{ url('/courses') }}" method="post" class="">
                @csrf
                <label class="fs-5 mb-1 mt-3">Course Name</label>
                <input type="text" name="course_name" class="form-control" value="{{ old('course_name') }}">

                <label class="fs-5 mb-1 mt-3">Course Outline</label>
                <textarea name="outlines" class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
                <label class="fs-5 mb-1 mt-3">Fee</label>
                <input type="text" name="course_fee" class="form-control" value="{{ old('course_fee') }}">

                <button class="btn btn-primary mt-3" type="submit"><i class="bi bi-floppy me-1"></i>Create</button>
            </form>
        </div>
    </div>
@endsection
