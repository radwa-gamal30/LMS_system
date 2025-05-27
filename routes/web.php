<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Models\Enrollment;
use App\Http\Controllers\CoursePamentController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//login route
Route::get('/login', function(){return view('auth.login');})->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');  
//     Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', function () {
    return view('home.index');
})->name('home.index');
// define users of system as students that make use of the system
Route::resource('/users',UserController::class);
Route::get('users/{user}/enrollments', [EnrollmentController::class, 'customIndex'])->name('users.enrollments');

Route::resource('/courses', CourseController::class);
Route::get('courses/{course}/lessons', [LessonController::class, 'customIndex'])->name('courses.lessons');

Route::resource('/enrollments', EnrollmentController::class);
Route::get('/enrollments/create/{user}', [EnrollmentController::class,'create'])->name('users.enrollments.create');
Route::get('/enrollments-choose-payment/{user}/{course}',[ CoursePamentController::class,'create'])->name('enrollments.choose-payment.create');
Route::post('/enrollments-choose-payment',[ CoursePamentController::class,'store'])->name('enrollments.choose-payment.store');
Route::resource('/lessons', LessonController::class);
Route::get('/lessons/{course}/lessons', [LessonController::class,'create'])->name('courses.lessons.create');
});

