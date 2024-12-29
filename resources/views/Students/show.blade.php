@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mx-1">Student List</h1>
        <a class="icon-link icon-link-hover" href="{{ url('/students') }}">
            <i class="bi bi-arrow-left"></i>
            Go Back
        </a>
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-warning">
                    <ol>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ol>
                </div>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Course</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
