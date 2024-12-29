@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="icon-link icon-link-hover mb-2" href="{{ url('/students') }}">
            <i class="bi bi-arrow-left"></i>
            Go Back
        </a>
        @if ($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        <form action="{{ url('/students') }}" method="post">
            @csrf
            <label class="fs-5">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            <br />
            <label class="fs-5">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            <br />
            <label class="fs-5">Course</label>
            <select name="course_id" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
            <br />
            <label class="fs-5">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            <br />
            <label class="fs-5">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
            <br />
            <button class="btn btn-success" type="submit">Confirm</button>
        </form>
    </div>
@endsection
