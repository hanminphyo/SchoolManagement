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
Route::get('/roles', [RoleContrller::class, 'index'])->name('roles');
Route::get('/courses', [CourseController::class, 'index'])->name('courses');
Route::get('/groups', [GroupController::class, 'index'])->name('groups');
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');

Route::resource('students', StudentController::class);
Route::get('students', [StudentController::class, 'index']);
Route::get('/students/create', [StudentController::class, 'create']);
Route::post('/students', [StudentController::class, 'store']);
Route::get('students/{$id}', [StudentController::class, 'show']);
Route::get('/students/{id}/edit', [StudentController::class, 'edit']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('students/{$id}', [StudentController::class, 'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
