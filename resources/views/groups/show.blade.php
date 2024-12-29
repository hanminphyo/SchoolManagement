@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="m-4">Class List</h1>
        <a class="icon-link icon-link-hover mb-2" href="{{ url('/groups') }}">
            <i class="bi bi-arrow-left"></i>
            Go Back
        </a>
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
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="row">{{ $group['id'] }}</th>
                        <td>{{ $group->course->name }}</td>
                        <td>{{ $group->teacher->name }}</td>
                        <td>{{ $group->days_in_a_week }}</td>
                        <td>{{ $group->start_time }}</td>
                        <td>{{ $group->end_time }}</td>
                        <td>{{ $group->start_date }}</td>
                        <td>{{ $group->end_date }}</td>

                        </td>

                    </tr>


                </tbody>
            </table>
        </div>
    </div>
@endsection
