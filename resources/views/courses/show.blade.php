@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="icon-link icon-link-hover" href="{{ url('/courses') }}">
            <i class="bi bi-arrow-left"></i>
            Back
        </a>
        <div class="container mt-4 d-flex justify-content-center">
            <div class="card col-md-8 mt-4">
                <div class="card-header fs-5 fw-bold">Course Details</div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="fs-5 fw-bold ms-3">Course Name:</label>
                            <span>{{ $course->name }}</span>
                        </div>
                        <div class="col-md-12">
                            <label class="fs-5 fw-bold ms-3">Outlines:</label>
                            <span>{{ $course->outlines }}</span>
                        </div>
                        <div class="col-md-12">
                            <label class="fs-5 fw-bold ms-3">Fee:</label>
                            <span>{{ $course->fee }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
