@extends('layouts.app')
@section('content')
    <div class="container fluid-width">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between mt-2">
                <h1>Teacher List</h1>
                <form action="{{ route('teachers.search') }}" method="GET" id="search-form"
                    class="col-lg-auto mb-lg-0 me-lg-3 pe-4" role="search">
                    <input type="search" id="search-input" class="form-control" placeholder="Search..." name="query"
                        value="{{ request('query') }}" aria-label="Search">
                </form>
            </div>
        </div>
        @auth
            <a href="{{ url('/teachers/create') }}" class="btn btn-primary mt-3"><i class="bi bi-person-plus-fill me-2"></i>Add
                Teacher</a>
        @endauth
        @session('info')
            <div class="alert alert-success mt-3">
                {{ session('info') }}
            </div>
        @endsession
        <div class="container d-none d-sm-block d-md-block mt-4">
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Course</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <th scope="row">{{ $teacher['id'] }}</th>
                            <td><a href="{{ url('/teachers/' . $teacher->id) }}">{{ $teacher->name }}</a></td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->course->name }}</td>
                            @auth
                                <td class="d-flex">
                                    <a href="{{ url('/teachers/' . $teacher->id . '/edit') }}" class="btn btn-warning me-2">
                                        <i class="bi bi-pencil-square me-1"></i>Edit</a>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#teacherModal" data-teacher-id="{{ $teacher->id }}">
                                        <i class="bi bi-trash3 me-1"></i>Delete
                                    </button>

                                    <div class="modal fade" id="teacherModal" tabindex="-1" aria-labelledby="teacherModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="teacherModalLabel">Teacher</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this teacher?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="teacherForm" action="{{ url('/teachers/' . $teacher->id) }}"
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
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="container d-block d-sm-none d-md-none mt-4">
            @foreach ($teachers as $teacher)
                <div class="card mt-3">
                    <div class="card-body">
                        <label class="ms-3 mb-2">Name:</label>
                        <span class="ms-4"><a
                                href="{{ url('/teachers/' . $teacher->id) }}">{{ $teacher->name }}</a></span>
                        <br>
                        <label class="ms-3 mb-2">Email:</label>
                        <span class="ms-4">{{ $teacher->email }}</span>
                        <br>
                        <label class="ms-3">Course:</label>
                        <span class="ms-3">{{ $teacher->course->name }}</span>
                        <br>
                        <div class="d-flex justify-content-end">
                            @auth
                                <a href="{{ url('/teachers/' . $teacher->id . '/edit') }}" class="nav nav-link">
                                    Edit</a>
                                <button type="button" class="nav nav-link" data-bs-toggle="modal"
                                    data-bs-target="#teacherModalSm" data-teacher-id="{{ $teacher->id }}">
                                    Delete
                                </button>
                                <div class="modal fade" id="teacherModalSm" tabindex="-1" aria-labelledby="teacherModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="teacherModalSmLabel">Teacher</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this teacher?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form id="teacherFormSm" action="{{ url('/teachers/' . $teacher->id) }}"
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
    </div>
@endsection
