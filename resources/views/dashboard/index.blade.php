@extends('layouts.app')
@section('content')
    <div class="contaienr ">

        <div class="row">

            <div class="col-md-12 mt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item  " aria-current="page">
                            <a href="{{ route('dashboard.users.assignRole') }}" class="text-decoration-none">Users</a>
                        </li>
                    </ol>
                </nav>
                <h1>Dashboard</h1>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-xxl-4 col-md-3 mt-3">
                <div class="card info-card bg-gradient-cosmic">
                    <h5 class="card-header">Course/ s</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center justify-content-between ">
                                <i class="bi bi-file-earmark fs-1 "></i>
                            </div>
                            <div class="ps-3 text-center">
                                <p class=" fs-3">{{ count($courses) }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('courses.index') }}" class="btn btn-light mt-3">See More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-3 mt-3">
                <div class="card info-card bg-gradient-cosmic">
                    <h5 class="card-header">Student/ s</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center justify-content-between ">
                                <i class="bi bi-person-fill fs-1 "></i>
                            </div>
                            <div class="ps-3 text-center">
                                <p class=" fs-3">{{ count($students) }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('students.index') }}" class="btn btn-light mt-3">See More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-3 mt-3">
                <div class="card info-card bg-gradient-cosmic">
                    <h5 class="card-header">Teacher/ s</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center justify-content-between ">
                                <i class="bi bi-person-video3 fs-1 "></i>
                            </div>
                            <div class="ps-3 text-center">
                                <p class=" fs-3">{{ count($teachers) }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('teachers.index') }}" class="btn btn-light mt-3">See More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-md-3 mt-3">
                <div class="card info-card bg-gradient-cosmic">
                    <h5 class="card-header">Class/ es</h5>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center justify-content-between ">
                                <i class="bi bi-people-fill fs-1 "></i>
                            </div>
                            <div class="ps-3 text-center">
                                <p class=" fs-3">{{ count($groups) }}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('groups.index') }}" class="btn btn-light mt-3">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
    </div>

    <div class="container mt-5">
        <h1 class="mb-3">Manage Users</h1>
        <table class="table mb-2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name ?? 'No Role' }}</td>
                        <td>
                            <form action="{{ route('dashboard.users.assignRole') }}" method="post">
                                @csrf
                                <select name="role_id" class="form-select">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Assign</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
