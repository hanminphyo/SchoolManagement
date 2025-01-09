@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="m-4">Class List</h1>
        <a class="icon-link icon-link-hover mb-2" href="{{ url('/groups') }}">
            <i class="bi bi-arrow-left"></i>
            Back
        </a>
        <div class="container mt-4">
            <div class="card p-4">
                <h3 class="mb-4">Class Information</h3>
                <div class="row g-3">
                    <div class="col-6 d-flex align-items-start">
                        <label class="form-label me-3">Class Name:</label>
                        <span class="fw-bold">{{ $group->name }}</span>
                    </div>
                    <div class="col-6 d-flex align-items-start">
                        <label class="form-label
                            me-3 ">Course Name:</label>
                        <span class="fw-bold">{{ $group->course->name }}</span>
                    </div>
                    <div class="col-6 d-flex align-items-start">
                        <label class="form-label
                            me-3 ">Teacher Name:</label>
                        @foreach ($teachers as $teacher)
                            <span class="fw-bold"><a
                                    href="{{ url('/teachers/' . $teacher->id) }}">{{ $teacher->name }}</a></span>
                        @endforeach
                    </div>
                    <div class="col-6 d-flex align-items-start">
                        <label class="form-label
                            me-3 ">Days:</label>
                        <span class="fw-bold">{{ $group->days_in_a_week }}</span>
                    </div>
                    <div class="col-6 d-flex align-items-start">
                        <label class="form-label
                            me-3 ">Start Time:</label>
                        <span class="fw-bold">{{ $group->start_time }}</span>
                    </div>
                    <div class="col-6 d-flex align-items-start">
                        <label class="form-label
                            me-3 ">End Time:</label>
                        <span class="fw-bold">{{ $group->end_time }}</span>
                    </div>
                    <div class="col-6 d-flex align-items-start">
                        <label class="form-label me-3 ">Start Date:</label>
                        <span class="fw-bold">{{ $group->start_date }}</span>
                    </div>
                    <div class="col-6 d-flex align-items-start">
                        <label class="form-label me-3 ">End Date:</label>
                        <span class="fw-bold">{{ $group->end_date }}</span>
                    </div>
                </div>
            </div>
            <hr>
        @endsection
