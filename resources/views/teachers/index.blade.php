@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-2">Teacher List</h1>
        @session('info')
            <div class="alert alert-success">
                {{ session('info') }}
            </div>
        @endsession
        @auth
            <a href="{{ url('/teachers/create') }}" class="btn btn-primary mt-2">Add Teacher</a>
        @endauth
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
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ optional($teacher->course)->name ?? 'No Course Assigned' }}</td>
                            <td><a href="{{ url('/teachers/' . $teacher->id) }}" class="btn btn-warning">Detail</a></td>
                            @auth
                                <td><a href="{{ url('/teachers/' . $teacher->id . '/edit') }}" class="btn btn-warning ">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('/teachers/' . $teacher->id) }}"method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
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
