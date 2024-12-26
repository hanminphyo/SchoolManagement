@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="m-4">User List</h1>
        <a href="{{ url('/users/create') }}" class="btn btn-primary">Add User</a>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user['id'] }}</th>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['role'] }}</td>
                            <td>{{ $user['phone'] }}</td>
                            <td>{{ $user['address'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
