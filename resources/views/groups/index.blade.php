@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-4">
                <h1 class="mt-2">Class List</h1>
            </div>
            <div class="col-4">
                @auth
                    <a href="{{ url('/groups/create') }}" class="btn btn-primary mt-3">
                        <i class="bi bi-plus-square me-2"></i>Add Class</a>
                @endauth
            </div>
        </div>
        @session('info')
            <div class="alert alert-success">
                {{ session('info') }}
            </div>
        @endsession
        <div class="container">
            <table class="table table-hover mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Teacher Name</th>
                        {{-- <th scope="col">Students</th> --}}
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
                            {{-- <td class="ms-3">( {{ count($group->student) }} )</td> --}}
                            <td>{{ $group->days_in_a_week }}</td>
                            <td>{{ $group->start_time }}</td>
                            <td>{{ $group->end_time }}</td>
                            <td>{{ $group->start_date }}</td>
                            <td>{{ $group->end_date }}</td>
                            <td class="d-flex">
                                @auth
                                    <a href="{{ url('/groups/' . $group->id . '/edit') }}"class="btn btn-warning me-2">
                                        <i class="bi bi-pencil-square"></i>Edit</a>

                                    <form action="{{ url('/groups/' . $group->id) }}"method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger me-2">
                                            <i class="bi bi-trash3"></i>Delete</button>
                                    </form>
                                @endauth
                            </td>
                    @endforeach
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
@endsection
