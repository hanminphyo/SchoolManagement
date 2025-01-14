@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="icon-link icon-link-hover mb-2 mt-3" href="{{ url('/teachers') }}">
            <i class="bi bi-arrow-left"></i>
            Go Back
        </a>
        <div class="container align-items-center">
            <div class="col-md-6 mb-3 mb-sm-0">
                <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="card-title">Teacher Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-4 float-start">
                                @if ($teacher->image)
                                    <img src="{{ Storage::url('teachers/' . $teacher->image) }}" class="img-thumbnail" />
                                @else
                                    <img src="{{ asset('images/noimage.png') }}" class="img-thumbnail"
                                        style="min_width=100,min_height=100" />
                                @endif
                            </div>
                            <div class="col-8 align-items-end">
                                <label class="ms-3">Name:</label>
                                <span class="ms-4">{{ $teacher->name }}</span>
                                <br>
                                <label class="ms-3">Email:</label>
                                <span class="ms-4">{{ $teacher->email }}</span>
                                <br>
                                <label class="ms-3">Course:</label>
                                <span class="ms-3">{{ $teacher->course->name }}</span>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    @endsection
