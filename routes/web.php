<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create-student', [App\Http\Controllers\StudentController::class, 'create_student'])->name('create.student');
Route::post('/create-student', [App\Http\Controllers\StudentController::class, 'store_student'])->name('store.student');
Route::get('/student-list', [App\Http\Controllers\StudentController::class, 'student_list'])->name('student.list');
Route::get('/student/{id}', [App\Http\Controllers\StudentController::class, 'student_edit'])->name('student.edit');
Route::put('/student/{id}', [App\Http\Controllers\StudentController::class, 'student_update'])->name('student.update');
Route::delete('/student/{id}', [App\Http\Controllers\StudentController::class, 'student_delete'])->name('student.delete');
Route::get('/education', [App\Http\Controllers\EducationControlller::class, 'education'])->name('education');
Route::post('/education', [App\Http\Controllers\EducationControlller::class, 'store_education'])->name('store.education');
Route::get('/education', [App\Http\Controllers\EducationControlller::class, 'education_list'])->name('education.list');
Route::get('/education/{id}', [App\Http\Controllers\EducationControlller::class, 'education_edit'])->name('education.edit');
Route::put('/education/{id}', [App\Http\Controllers\EducationControlller::class, 'education_update'])->name('education.update');
Route::delete('/education/{id}', [App\Http\Controllers\EducationControlller::class, 'education_delete'])->name('education.delete');
