@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-2">Student List</h1>
        @session('info')
            <div class="alert alert-success">
                {{ session('info') }}
            </div>
        @endsession
        @auth
            <a href="{{ url('/students/create') }}" class="btn btn-primary">Add Student</a>
        @endauth
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
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->course->name }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->address }}</td>
                            <td><a href="{{ url('/students/' . $student->id) }}" class="btn btn-warning">Detail</a></td>
                            @auth
                                <td><a href="{{ url('/students/' . $student->id . '/edit') }}" class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url('/students/' . $student->id) }}"method="post">
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
