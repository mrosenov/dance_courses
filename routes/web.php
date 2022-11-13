<?php


use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\SemestersController;
use \App\Http\Controllers\StudiosController;
use \App\Http\Controllers\CoursesController;
use \App\Http\Controllers\SemestersCalendarController;

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
    return view('index');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
});


// Dashboard Admin Panel
Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin')->middleware('admin');

    //Semesters
    Route::get('admin/semesters', [SemestersController::class, 'index'])->name('semesters')->middleware('admin');
    Route::get('admin/semesters/{semester:id}', [SemestersController::class, 'index_semester'])->name('semester')->middleware('admin');

    // Studios
    Route::get('admin/studios/{studio:id}', [StudiosController::class, 'index_courses'])->name('studio')->middleware('admin');

    // Courses
    Route::get('admin/courses/{course:id}', [CoursesController::class, 'index'])->name('course')->middleware('admin');

    // Semester Calendar
    Route::get('admin/calendar', [SemestersCalendarController::class, 'index'])->name('calendar')->middleware('admin');
    Route::get('admin/calendar/{semester:id}', [SemestersCalendarController::class, 'calendar'])->name('semester_calendar')->middleware('admin');

    // Users
    Route::get('admin/users', [DashboardController::class, 'index_users'])->name('users')->middleware('admin');
    Route::get('admin/teachers', [DashboardController::class, 'index_teachers'])->name('teachers')->middleware('admin');
    Route::get('admin/students', [DashboardController::class, 'index_students'])->name('students')->middleware('admin');

    // Age Groups
    Route::get('admin/age_groups', [DashboardController::class, 'index_AgeGroups'])->name('age-groups')->middleware('admin');

    // Dance Styles
    Route::get('admin/dance_style', [DashboardController::class, 'index_DanceStyles'])->name('dance-styles')->middleware('admin');
});

require __DIR__.'/auth.php';
