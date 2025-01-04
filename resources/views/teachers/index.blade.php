@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-4">
                <h1 class="mt-3">Teacher List</h1>
            </div>
            <div class="col-4">
                @auth
                    <a href="{{ url('/teachers/create') }}" class="btn btn-primary mt-3"><i
                            class="bi bi-person-plus-fill me-2"></i>Add
                        Teacher</a>
                @endauth
            </div>
        </div>
        @session('info')
            <div class="alert alert-success">
                {{ session('info') }}
            </div>
        @endsession
        <div class="container">
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
                            <td>{{ optional($teacher->course)->name ?? 'No Course Assigned' }}</td>
                            @auth
                                <td><a href="{{ url('/teachers/' . $teacher->id . '/edit') }}" class="btn btn-warning ">
                                        <i class="bi bi-pencil-square me-1"></i>Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('/teachers/' . $teacher->id) }}"method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash3 me-1"></i>Delete</button>
                                    </form>
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
