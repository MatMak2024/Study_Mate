<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\EnrollmentsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;



Route::resource('students', StudentsController::class);

Route::resource('courses', CourseController::class);

Route::resource('enrollments', EnrollmentsController::class);





Route::get('/', function () {
    return view('welcome');
})->name('home');



Auth::routes();

Route::get('auth/home', [HomeController::class, 'index'])->name('auth.home');
Route::get('user/home', [HomeController::class, 'index'])->name('pages.student.home');
