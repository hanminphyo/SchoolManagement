@extends('layouts.app')
@section('content')
    <h1 class="m-4">Course List</h1>
    <div class="container mt-4">
        <a href="{{ url('/courses/create') }}" class="btn btn-primary">Add Course</a>
        <div class="row">
            <div class="col-6 mx-auto">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Course Name</th>
                            {{-- <th scope="col">Student</th> --}}
                            <th scope="col">Fee</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <th scope="row">
                                    {{ $course['id'] }}</th>
                                <td>{{ $course->name }}({{ count($course->students) }})</td>
                                <td>{{ $course->fee }}</td>
                                <td><a href="{{ url('/courses/' . $course->id) }}" class="btn btn-success">Manage</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
