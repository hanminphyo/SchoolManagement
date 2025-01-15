<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
Route::post('/dashboard/users', [UserController::class, 'assignRole'])->name('dashboard.users.assignRole');
Route::resource('dashboard', UserController::class);


// Admin Management
Route::resource('dashboard', DashboardController::class);

// Course Mangagement
Route::get('/courses/search', [CourseController::class, 'search'])->name('courses.search');
Route::resource('courses', CourseController::class);

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

//Teacher Management
// Route::get('/teachers', [TeacherController::class, 'getTeachers'])->name('get.teachers');
Route::get('/teachers/search', [TeacherController::class, 'search'])->name('teachers.search');
Route::resource('teachers', TeacherController::class);

// Group Management
Route::get('/groups/search', [GroupController::class, 'search'])->name('groups.search');
Route::resource('groups', GroupController::class);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
