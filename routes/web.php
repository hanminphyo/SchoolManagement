<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::resource('/users', UserController::class);

//Student Management//
Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');
Route::resource('students', StudentController::class);
// Route::get('students', [StudentController::class, 'index']);
// Route::get('/students/create', [StudentController::class, 'create']);
// Route::post('/students', [StudentController::class, 'store']);
// Route::get('students/{$id}', [StudentController::class, 'show']);
// Route::get('/students/{id}/edit', [StudentController::class, 'edit']);
// Route::put('/students/{id}', [StudentController::class, 'update']);
// Route::delete('students/{$id}', [StudentController::class, 'destroy']);

// Course Mangagement
Route::get('/courses/search', [CourseController::class, 'search'])->name('courses.search');
Route::resource('courses', CourseController::class);

// Group Management
Route::get('/groups/search', [GroupController::class, 'search'])->name('groups.search');
Route::resource('groups', GroupController::class);

//Teacher Management
Route::get('/teachers/search', [TeacherController::class, 'search'])->name('teachers.search');
Route::resource('teachers', TeacherController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
