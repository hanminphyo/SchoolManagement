@extends('layouts.app')
@section('content')
    <h1>Classes List</h1>
    <div class="container mt-4">
        <div class="row">
            <div class="col-6 mx-auto">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            {{-- <th scope="col">Teacher</th> --}}
                            <th scope="col">Courses</th>
                            <th scope="col">Date of Attendance</th>
                            <th scope="col">Time</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <th scope="row">{{ $group['id'] }}</th>
                                <td>{{ $group->course->name }}</td>
                                <td>{{ $group->days_in_a_week }}</td>
                                <td>{{ $group->time }}</td>
                                <td>{{ $group->start_date }}</td>
                                <td>{{ $group->end_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
