@extends('layouts.app')
@section('content')
    <div class="container">
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
        <div class="container ">
            <form action="{{ url('/courses') }}" method="post" class="">
                @csrf
                <label>Course Name</label>
                <input type="text" name="course_name" class="form-control" value="{{ old('course_name') }}">

                <label>Fee</label>
                <input type="text" name="course_fee" class="form-control" value="{{ old('course_fee') }}">

                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>
@endsection
