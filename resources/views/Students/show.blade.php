@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="icon-link icon-link-hover mb-3 mt-3" href="{{ url('/students') }}">
            <i class="bi bi-arrow-left"></i>
            Back
        </a>
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
        </div>
        <div class="container aling-items-center">
            <div class="col-md-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Student Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-4  float-start">
                                @if ($student->image)
                                    <img src="{{ Storage::url('students/' . $student->image) }}" class="img-thumbnail"
                                        style="min-width: 100px; min-height: 100px;" />
                                @else
                                    <img src="{{ asset('images/noimage.png ') }}" class="img-thumbnail" />
                                @endif
                                <div class="mt-3">
                                    <label>Date:</label>
                                    <span>{{ $student->created_at->format('d/m/Y') }}</span>
                                </div>
                            </div>
                            <div class="col-8  align-items-end">
                                <label class="mx-4">Name:</label>
                                <span class="ms-3 fw-bold">{{ $student->name }}</span>
                                <br />
                                <label class="mx-4">Email:</label>
                                <span class="ms-3 fw-bold">{{ $student->email }}</span>
                                <br />
                                <label class="mx-4">Course:</label>
                                <span class="ps-2 fw-bold">{{ $student->course->name }}</span>
                                <br />
                                <label class="mx-4">Phone:</label>
                                <span class="ps-2 fw-bold">{{ $student->phone }}</span>
                                <br />
                                <label class="mx-4">Address:</label>
                                <span class="pe-4 fw-bold">{{ $student->address }}</span>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    @endsection
