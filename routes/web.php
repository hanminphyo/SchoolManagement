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

//Student Management//
Route::resource('students', StudentController::class);
Route::get('students', [StudentController::class, 'index']);
Route::get('/students/create', [StudentController::class, 'create']);
Route::post('/students', [StudentController::class, 'store']);
Route::get('students/{$id}', [StudentController::class, 'show']);
Route::get('/students/{id}/edit', [StudentController::class, 'edit']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('students/{$id}', [StudentController::class, 'destroy']);


// Course Mangagement
Route::resource('courses', CourseController::class);
Route::get('courses', [CourseController::class, 'index']);
Route::get('/courses/create', [CourseController::class, 'create']);
Route::post('/courses', [CourseController::class, 'store']);
Route::get('courses/{$id}', [CourseController::class, 'show']);
Route::get('/courses/{id}/edit', [CourseController::class, 'edit']);
Route::put('/courses/{id}', [StudentController::class, 'update']);
Route::delete('courses/{$id}', [CourseController::class, 'destroy']);


Route::resource('groups', GroupController::class);
Route::get('groups', [GroupController::class, 'index']);
Route::get('/groups/create', [GroupController::class, 'create']);
Route::get('/groups', [GroupController::class, 'store']);

// Route::resource('teachers', TeacherController::class);
// Route::get('teachers', [TeacherController::class, 'index']);
// Route::get('teachers/create', [TeacherController::class, 'create']);

Route::get('/roles', [RoleContrller::class, 'index'])->name('roles');
// Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');

// Route::resource('user', UserController::class);
// Route::get('users', [UserController::class, 'index']);
// Route::get('/users/create', [UserController::class, 'create']);
// Route::post('users', [UserController::class, 'store']);





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
