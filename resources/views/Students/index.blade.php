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
            <a href="{{ url('/students/create') }}" class="btn btn-primary  mt-3 mb-2">
                <i class="bi bi-person-plus-fill me-2"></i>Add Student
            </a>
        @endauth
        @session('info')
            <div class="alert alert-primary">
                {{ session('info') }}
            </div>
        @endsession

        <div class="container d-none d-sm-block d-md-block">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Course</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        @auth
                            <th scope="col">Action</th>
                        @endauth
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
                            @auth
                                <td class="d-flex">
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
                                                    <form id="studentForm" action="{{ url('/students/' . $student->id) }}"
                                                        method="post">
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
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container d-lg-none">
        @foreach ($students as $student)
            <div class="card mt-3">
                <div class="card-body">
                    <label class="ms-3">Name:</label>
                    <span class="ms-3 fw-bold"><a
                            href="{{ url('/students/' . $student->id) }}">{{ $student->name }}</a></span>
                    <br />
                    <label class="ms-3">Email:</label>
                    <span class="ms-3 fw-bold">{{ $student->email }}</span>
                    <br />
                    <label class="ms-3">Course:</label>
                    <span class="ms-2 fw-bold">{{ $student->course->name }}</span>
                    <br />
                    <label class="ms-3">Phone:</label>
                    <span class="ms-2 fw-bold">{{ $student->phone }}</span>
                    <br />
                    <label class="ms-3">Address:</label>
                    <span class="pe-4 fw-bold">{{ $student->address }}</span>
                    <br />
                    <div class="d-flex justify-content-end">
                        @auth
                            <a href="{{ url('/students/' . $student->id . '/edit') }}" class="nav nav-link">
                                Edit</a>
                            <button type="button" class="nav nav-link" data-bs-toggle="modal" data-bs-target="#studentModalSm"
                                data-student-id="{{ $student->id }}">
                                Delete
                            </button>
                            <div class="modal fade" id="studentModalSm" tabindex="-1" aria-labelledby="studentModalSmLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="studentModalSmLabel">Student</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this student?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form id="studentFormSm" action="{{ url('/students/' . $student->id) }}"
                                                method="post">
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
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
