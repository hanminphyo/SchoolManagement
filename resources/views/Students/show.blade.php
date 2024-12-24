@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="m-4">Student List</h1>
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
                    <tr>
                        <th scope="row">{{ $student['id'] }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->course->name }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->address }}</td>
                        <td><a href="{{ url('/students/' . $student->id . '/edit') }}" class="btn btn-warning">Edit</a></td>
                        <form action="{{ url('/students/' . $student->id) }}"method="post">
                            @csrf
                            @method('DELETE')
                            <td><button type="submit" class="btn btn-danger">Delete</button></td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
