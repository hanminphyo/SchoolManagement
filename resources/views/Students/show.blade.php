@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mx-1">Student List</h1>
        <a class="icon-link icon-link-hover mb-3" href="{{ url('/students') }}">
            <i class="bi bi-arrow-left"></i>
            Go Back
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
        <div class="container">
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
            <hr>
        </div>
        {{-- <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Course</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{ $student['id'] }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->course->name }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->address }}</td>
                </tr>
            </tbody>
        </table> --}}
    </div>
@endsection
