@extends('layouts.app')
@section('content')
    <h1 class="m-4">Teacher List</h1>
    <div class="container mt-4">
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
                        <tr>
                            <th scope="row">{{ $teacher['id'] }}</th>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>
                                {{ optional($teacher->course)->name ?? 'No Course Assigned' }}
                            </td>
                            <td><a href="{{ url('/teachers/' . $teacher->id . '/edit') }}"
                                    class="btn btn-warning mb-3">Edit</a>
                                <form action="{{ url('/teachers/' . $teacher->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
