@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-12 d-flex justify-content-between">
                <h1>Course List</h1>
                <form action="{{ route('courses.search') }}" method="GET" id="search-form"
                    class="col-lg-auto mb-lg-0 me-lg-3 pe-4" role="search">
                    <input type="search" id="search-input" class="form-control" placeholder="Search..." name="query"
                        value="{{ request('query') }}" aria-label="Search">
                </form>

            </div>
        </div>
        @auth
            <a href="{{ url('/courses/create') }}" class="btn btn-primary mt-3 mb-2"><i
                    class="bi bi-file-earmark-plus-fill me-1"></i>Add Course</a>
        @endauth
        @session('info')
            <div class="alert alert-success">
                {{ session('info') }}
            </div>
        @endsession
        <div class="container d-none d-sm-block d-md-block mt-4">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Students</th>
                        <th scope="col">Outline</th>
                        <th scope="col">Fee</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <th scope="row">{{ $course['id'] }}</th>
                            <td><a href="{{ url('/courses/' . $course->id) }}">{{ $course->name }}</a></td>
                            {{-- @foreach ($studnets as $student) --}}
                            <td class="ms-3">
                                {{ count($course->students) }} </td>
                            {{-- @endforeach --}}
                            <td>{{ $course->outlines }}<br /></td>
                            <td>{{ $course->fee }}</td>
                            <td class="d-flex">
                                @auth
                                    <a href="{{ url('/courses/' . $course->id . '/edit') }}"class="btn btn-warning me-2">
                                        <i class="bi bi-pencil-square me-1"></i> Edit</a>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#courseModal" data-course-id="{{ $course->id }}">
                                        <i class="bi bi-trash3 me-1"></i>Delete
                                    </button>
                                    <div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="courseModalLabel">Course</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this course?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="courseForm" action="{{ url('/courses/' . $course->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger ">
                                                            <i class="bi bi-trash3 me-1"></i>Delete</button>
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

        <div class="container d-block d-sm-none d-md-none mt-4">
            @foreach ($courses as $course)
                <div class="card mb-3">
                    <div class="card-body">
                        <label class="ms-3">Name:</label>
                        <span class="ms-4 fw-bold"><a
                                href="{{ url('/courses/' . $course->id) }}">{{ $course->name }}</a></span>
                        <br />
                        <label class="ms-3">Students:</label>
                        <span class="ms-2">{{ count($course->students) }}</span>
                        <br />
                        <label class="ms-3">Outline:</label>
                        <span class="ms-3">{{ $course->outlines }}</span>
                        <br />
                        <label class="ms-3">Fee:</label>
                        <span class="ms-4">{{ $course->fee }}</span>
                        <br />
                        <div class="d-flex justify-content-end">
                            @auth
                                <a href="{{ url('/courses/' . $course->id . '/edit') }}" class="nav nav-link">Edit</a>
                                <button type="button" class="nav nav-link" data-bs-toggle="modal"
                                    data-bs-target="#courseModalSm" data-course-id="{{ $course->id }}">
                                    Delete
                                </button>
                                <div class="modal fade" id="courseModalSm" tabindex="-1" aria-labelledby="courseModalSmLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="courseModalSmLabel">Course</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this course?</p>
                                            </div>

                                            <div class="modal-footer">
                                                <form id="courseFormSm" action="{{ url('/courses/' . $course->id) }}"
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
