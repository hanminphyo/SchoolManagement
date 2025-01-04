@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="m-4">Class List</h1>
        <a class="icon-link icon-link-hover mb-2" href="{{ url('/groups') }}">
            <i class="bi bi-arrow-left"></i>
            Go Back
        </a>
        {{-- <div class="container">
            <div class="row">
                <div class="col-12">
                    <label class="mx-4">Class Name:</label>
                    <span class="ms-3 fw-bold">{{ $group->name }}</span>
                </div>
                <div class="col-12">
                    <label class="mx-4">Course Name:</label>
                    <span class="ms-2 fw-bold">{{ $group->course->name }}</span>
                </div>
                <div class="col-12">
                    <label class="mx-4">Teacher Name:</label>
                    <span class="ms-1 fw-bold">{{ $group->teacher->name }}</span>
                </div>
                <div class="col-12">
                    <label class="mx-4 me-4">Days :</label>
                    <span class="ms-5 fw-bold">{{ $group->days_in_a_week }}</span>
                </div>
                <div class="col-12">
                    <label class="mx-4">Start Time:</label>
                    <span class="pe-4 fw-bold">{{ $group->start_time }}</span>
                </div>
                <div class="col-12">
                    <label class="mx-4">End Time:</label>
                    <span class="pe-4 fw-bold">{{ $group->end_time }}</span>
                </div>
                <div class="col-12">
                    <label class="mx-4">Start Date:</label>
                    <span class="pe-4 fw-bold">{{ $group->start_date }}</span>
                </div>
                <div class="col-12">
                    <label class="mx-4">End Date:</label>
                    <span class="pe-4 fw-bold">{{ $group->end_date }}</span>
                </div>
            </div>
        </div> --}}
        <div class="container mt-4">
            <div class="row g-3">
                <div class="col-12 d-flex align-items-start">
                    <label class="form-label me-3">Class Name:</label>
                    <span class="fw-bold">{{ $group->name }}</span>
                </div>
                <div class="col-12 d-flex align-items-start">
                    <label class="form-label me-3 ">Course Name:</label>
                    <span class="fw-bold">{{ $group->course->name }}</span>
                </div>
                <div class="col-12 d-flex align-items-start">
                    <label class="form-label me-3 ">Teacher Name:</label>
                    <span class="fw-bold">{{ $group->teacher->name }}</span>
                </div>
                <div class="col-12 d-flex align-items-start">
                    <label class="form-label me-3 ">Days:</label>
                    <span class="fw-bold">{{ $group->days_in_a_week }}</span>
                </div>
                <div class="col-12 d-flex align-items-start">
                    <label class="form-label me-3 ">Start Time:</label>
                    <span class="fw-bold">{{ $group->start_time }}</span>
                </div>
                <div class="col-12 d-flex align-items-start">
                    <label class="form-label me-3 ">End Time:</label>
                    <span class="fw-bold">{{ $group->end_time }}</span>
                </div>
                <div class="col-12 d-flex align-items-start">
                    <label class="form-label me-3 ">Start Date:</label>
                    <span class="fw-bold">{{ $group->start_date }}</span>
                </div>
                <div class="col-12 d-flex align-items-start">
                    <label class="form-label me-3 ">End Date:</label>
                    <span class="fw-bold">{{ $group->end_date }}</span>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection
