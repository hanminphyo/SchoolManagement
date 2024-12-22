@extends('layouts.app')
@section('content')
    <h1 class="m-4">Roles List</h1>
    <div class="container mt-4">
        <div class="row">
            <div class="col-6 mx-auto">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <th scope="row">{{ $role['id'] }}</th>
                                <td>{{ $role['name'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
