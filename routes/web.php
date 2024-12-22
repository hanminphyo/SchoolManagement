<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\RoleContrller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::resource('/users', UserController::class);

Route::get('/users', [UserController::class, 'index']);
Route::get('/roles', [RoleContrller::class, 'index']);
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/groups', [GroupController::class, 'index']);
Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/students', [StudentController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
