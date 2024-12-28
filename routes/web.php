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
// Route::get('students', [StudentController::class, 'index']);
// Route::get('/students/create', [StudentController::class, 'create']);
// Route::post('/students', [StudentController::class, 'store']);
// Route::get('students/{$id}', [StudentController::class, 'show']);
// Route::get('/students/{id}/edit', [StudentController::class, 'edit']);
// Route::put('/students/{id}', [StudentController::class, 'update']);
// Route::delete('students/{$id}', [StudentController::class, 'destroy']);


// Course Mangagement
Route::resource('courses', CourseController::class);
// Route::get('courses', [CourseController::class, 'index']);
// Route::get('/courses/create', [CourseController::class, 'create']);
// Route::post('/courses', [CourseController::class, 'store']);
// Route::get('courses/{$id}', [CourseController::class, 'show']);
// Route::get('/courses/{id}/edit', [CourseController::class, 'edit']);
// Route::put('/courses/{id}', [StudentController::class, 'update']);
// Route::delete('courses/{$id}', [CourseController::class, 'destroy']);

// Group Management
Route::resource('groups', GroupController::class);
// Route::get('groups', [GroupController::class, 'index']);
// Route::get('/groups/create', [GroupController::class, 'create']);
// Route::post('/groups', [GroupController::class, 'store']);
// Route::get('/groups/{id}', [GroupController::class, 'show']);
// Route::get('/groups/{id}/edit', [GroupController::class, 'edit']);
// Route::put('/groups/{id}/', [GroupController::class, 'update']);
// Route::delete('groups/{$id}', [GroupController::class, 'destroy']);

//Teacher Management
Route::resource('teachers', TeacherController::class);
// Route::get('teachers', [TeacherController::class, 'index']);
// Route::get('teachers/create', [TeacherController::class, 'create']);
// Route::post('/teachers', [TeacherController::class, 'store']);
// Route::get('/teachers/{id}', [TeacherController::class, 'show']);
// Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit']);
// Route::put('/teachers/{id}', [TeacherController::class, 'update']);
// Route::delete('teachers/{$id}', [TeacherController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
