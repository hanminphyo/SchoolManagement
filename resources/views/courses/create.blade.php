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
        <form action="{{ url('/courses') }}" method="post">
            @csrf
            <label>Course Name</label>
            <input type="text" name="course_name" class="form-control" value="{{ old('course_name') }}">
            <br />
            <label>Fee</label>
            <input type="text" name="course_fee" class="form-control" value="{{ old('course_fee') }}">
            <br />
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
@endsection
