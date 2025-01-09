@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between mt-2">
                <h1>Class List</h1>
                <form action="{{ route('groups.search') }}" method="GET" id="search-form"
                    class="col-lg-auto mb-lg-0 me-lg-3 pe-4" role="search">
                    <input type="search" id="search-input" class="form-control" placeholder="Search..." name="query"
                        value="{{ request('query') }}" aria-label="Search">
                </form>
            </div>
        </div>
        @auth
            <a href="{{ url('/groups/create') }}" class="btn btn-primary mt-3">
                <i class="bi bi-plus-square me-2"></i>Add Class</a>
        @endauth
        @session('info')
            <div class="alert alert-success mt-3">
                {{ session('info') }}
            </div>
        @endsession
        <div class="container d-none d-sm-block d-md-block">
            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Teacher Name</th>
                        <th scope="col">Days of Attendence</th>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groups as $group)
                        <tr>
                            <th scope="row">{{ $group->id }}</th>
                            <td>
                                <a href="{{ url('/groups/' . $group->id) }}">
                                    {{ $group->name }}</a>
                            </td>
                            <td>{{ $group->course->name }} </td>
                            <td>{{ $group->teacher->name }}</td>
                            <td>{{ $group->days_in_a_week }}</td>
                            <td>{{ $group->start_time }}</td>
                            <td>{{ $group->end_time }}</td>
                            <td>{{ $group->start_date }}</td>
                            <td>{{ $group->end_date }}</td>
                            <td class="d-flex">
                                @auth
                                    <a href="{{ url('/groups/' . $group->id . '/edit') }}"class="btn btn-warning me-2">
                                        <i class="bi bi-pencil-square"></i>Edit</a>


                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#groupModal" data-group-id="{{ $group->id }}">
                                        <i class="bi bi-trash3 me-1"></i>Delete
                                    </button>
                                    <div class="modal fade" id="groupModal" tabindex="-1" aria-labelledby="gropModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="gropModalLabel">Class</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this class?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="groupForm" action="{{ url('/groups/' . $group->id) }}"
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
        <div class="container d-lg-none">
            @foreach ($groups as $group)
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $group->name }}</h5>
                        <p class="card-text"><strong>Course Name:</strong> {{ $group->course->name }}</p>
                        <p class="card-text"><strong>Teacher Name:</strong> {{ $group->teacher->name }}</p>
                        <p class="card-text"><strong>Days of Attendance:</strong> {{ $group->days_in_a_week }}</p>
                        <p class="card-text"><strong>Start Time:</strong> {{ $group->start_time }}</p>
                        <p class="card-text"><strong>End Time:</strong> {{ $group->end_time }}</p>
                        <p class="card-text"><strong>Start Date:</strong> {{ $group->start_date }}</p>
                        <p class="card-text"><strong>End Date:</strong> {{ $group->end_date }}</p>
                        <div class="d-flex justify-content-end">
                            @auth
                                <a href="{{ url('/groups/' . $group->id . '/edit') }}" class="nav nav-link">
                                    Edit</a>
                                <button type="button" class="nav nav-link" data-bs-toggle="modal"
                                    data-bs-target="#groupModalSm{{ $group->id }}">
                                    Delete
                                </button>
                                <div class="modal fade" id="groupModalSm{{ $group->id }}" tabindex="-1"
                                    aria-labelledby="groupModalSmLabel{{ $group->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="groupModalSmLabel{{ $group->id }}">Class</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this class?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ url('/groups/' . $group->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="bi bi-trash3 me-1"></i>Delete</button>
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
