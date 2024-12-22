@extends('layouts.app')
@section('content')
    <h1 class="m-4">Users List</h1>
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
@endsection
