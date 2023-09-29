<?php

use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Students routes
Route::apiResource('/student', StudentController::class);

// Course routes

use App\Http\Controllers\Api\CourseController;

Route::get('/course', [CourseController::class, 'index']);
Route::get('/course', [CourseController::class, 'search']);
Route::get('/courses/{courseId}/grades', [CourseController::class, 'getCourseWithStudentGrades']);


// Enrollment routes

use App\Http\Controllers\Api\Enrollment;

Route::post('/enroll', [Enrollment::class, 'addStudentToCourse']);
Route::delete('/enroll', [Enrollment::class, 'removeStudentFromCourse']);
