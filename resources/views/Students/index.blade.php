@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between mt-2">
                <h1>Student List</h1>
                <form action="{{ route('students.search') }}" method="GET" id="search-form"
                    class="col-lg-auto mb-lg-0 me-lg-3 pe-4" role="search">
                    <input type="search" id="search-input" class="form-control" placeholder="Search..." name="query"
                        value="{{ request('query') }}" aria-label="Search">
                </form>
            </div>
        </div>
        @auth
            <a href="{{ url('/students/create') }}" class="btn btn-primary  mt-3 mb-2"><i
                    class="bi bi-person-plus-fill me-2"></i>Add Student</a>
        @endauth
        @session('info')
            <div class="alert alert-primary">
                {{ session('info') }}
            </div>
        @endsession

        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Course</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <th scope="row">{{ $student['id'] }}</th>
                            <td><a href="{{ url('/students/' . $student->id) }}">{{ $student->name }}</a></td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->course->name }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->address }}</td>
                            <td class="d-flex">
                                @auth
                                    <a href="{{ url('/students/' . $student->id . '/edit') }}" class="btn btn-warning me-2">
                                        <i class="bi bi-pencil-square me-1"></i>Edit</a></a>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#studentModal" data-student-id="{{ $student->id }}">
                                        <i class="bi bi-trash3 me-1"></i>Delete
                                    </button>

                                    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="studentModalLabel">Student</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this student?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="studentForm" action="{{ url('/students/' . $student->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="bi bi-trash3 me-1"></i>Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <button type="button" data-student-id="{{ $student->id }}" data-bs-toggle="modal"
                                        data-bs-target="#studentModal">Delete Student</button>
                                    <div id="studentModal" class="modal fade">
                                        <form id="studentForm" method="POST">
                                            <button type="submit">Confirm Delete</button>
                                        </form>
                                    </div> --}}
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="container d-lg-none">
        <form action="{{ url('/students/' . $student->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-6 ">
                    <label class="fs-5 mb-2">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $student->name }}">
                </div>
                <div class="col-md-6 ">
                    <label class="fs-5 mb-2">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $student->email }}">
                </div>
                <div class="col-md-6 mt-3">
                    <label class="fs-5 mb-2">Course</label>
                    <select name="course_id" class="form-control">

                        <option>
                            Course
                        </option>

                    </select>
                </div>
                <div class="col-md-6 mt-3">
                    <label class="fs-5 mb-2">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
                </div>
                <div class="col-md-6 mt-3">
                    <label class="fs-5 mb-2">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $student->address }}">
                </div>
            </div>
            <button class="btn btn-success ms-2 mt-3" type="submit">
                <i class="bi bi-file-earmark-arrow-up-fill me-1"></i>Update</button>
        </form>
    </div> --}}
@endsection
