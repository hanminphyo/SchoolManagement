@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-2">Teacher List</h1>
        <a class="icon-link icon-link-hover mb-2" href="{{ url('/teachers') }}">
            <i class="bi bi-arrow-left"></i>
            Go Back
        </a>
        <div class="container mt-4">
            <form>
                <label>Teacher Name</label>
                <input type="text" name="name" class="form-control" value="{{ $teacher->name }}" readonly>
                <br />
                <label>Teacher Email</label>
                <input type="email" name="email" class="form-control" value="{{ $teacher->email }}" readonly>
                <br />
            </form>
        </div>
    </div>
@endsection
