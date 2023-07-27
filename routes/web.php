<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::get('/', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'import'])->name('student.import');
Route::get('download-template-student', [StudentController::class, 'downloadStudentTemplate'])->name('student.download-template');
