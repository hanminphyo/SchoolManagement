@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="m-4">Class List</h1>
        <a href="{{ url('/groups/create') }}" class="btn btn-primary">Add Class</a>
        {{-- @session('info')
            <div class="alert alert-success">
                {{ session('info') }}
            </div>
        @endsession --}}
        {{-- <a href="{{ url('/students/create') }}" class="btn btn-primary">Add Student</a> --}}
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
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
                            <th scope="row">{{ $group['id'] }}</th>
                            <td>{{ $group->course->name }}</td>
                            <td>{{ $group->teacher->name }}</td>
                            <td>{{ $group->days_in_a_week }}</td>
                            <td>{{ $group->start_time }}</td>
                            <td>{{ $group->end_time }}</td>
                            <td>{{ $group->start_date }}</td>
                            <td>{{ $group->end_date }}</td>
                            <td><a href="{{ url('/groups/' . $group->id) }}" class="btn btn-outline-success">Manage</a></td>
                    @endforeach
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
@endsection
