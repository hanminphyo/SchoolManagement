@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-2">Course List</h1>
        <a class="icon-link icon-link-hover mb-2" href="{{ url('/courses') }}">
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
        <form action="{{ url('/courses/' . $course->id) }}" method="post">
            @method('PUT')
            @csrf
            <label class="fs-5">Course Name</label>
            <input type="text" name="name" class="form-control" value="{{ $course->name }}">
            <br />
            <label class="fs-5">Fee</label>
            <input type="text" name="fee" class="form-control" value="{{ $course->fee }}">
            <br />
            <button class="btn btn-success" type="submit">Update</button>
        </form>
    </div>
@endsection
