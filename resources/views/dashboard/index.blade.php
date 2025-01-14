@extends('layouts.app')
@section('content')
    <div class="contaienr">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h1>Dashboard</h1>
            </div>
        </div>
        <div class="row">
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
    </div>
@endsection
