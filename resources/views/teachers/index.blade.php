@extends('layouts.app')
@section('content')
    @session('info')
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endsession
    <h1 class="m-4">Teacher List</h1>
    <div class="container mt-4">
        <a href="{{ url('/teachers/create') }}" class="btn btn-primary">Add Teacher</a>
        <div class="row">
            <div class="col-6 mx-auto">
                <table class="table table-bordered text-center">
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
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ optional($teacher->course)->name ?? 'No Course Assigned' }}</td>
                                <td><a href="{{ url('/teachers/' . $teacher->id) }}" class="btn btn-warning">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
