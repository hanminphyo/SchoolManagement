@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-4">
                <h1 class="mt-2">Course List</h1>
            </div>
            <div class="col-4">
                @auth
                    <a href="{{ url('/courses/create') }}" class="btn btn-primary">Add Course</a>
                @endauth
            </div>
        </div>
        @session('info')
            <div class="alert alert-success">
                {{ session('info') }}
            </div>
        @endsession
        <div class="container mt-4">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Students</th>
                        <th scope="col">Fee</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <th scope="row">{{ $course['id'] }}</th>
                            <td><a href="{{ url('/courses/' . $course->id) }}">{{ $course->name }}</a></td>
                            <td class="ms-3">( {{ count($course->students) }} )</td>
                            <td>{{ $course->fee }}</td>
                            <td class="d-flex">
                                @auth
                                    <a href="{{ url('/courses/' . $course->id . '/edit') }}"class="btn btn-warning me-2">
                                        Edit</a>
                                    <form action="{{ url('/courses/' . $course->id) }}"method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger me-2">Delete</button>
                                    </form>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
