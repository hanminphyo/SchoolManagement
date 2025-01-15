@extends('layouts.app')
@section('content')
    <a class="icon-link icon-link-hover mt-3 mb-2" href="{{ url('/dashboard') }}">
        <i class="bi bi-arrow-left"></i>
        Back
    </a>
    <div class="container">
        <h1 class="mt-3">User List</h1>
        <table class="table mb-2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name ?? 'No Role' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
