<?php


use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\SemestersController;
use \App\Http\Controllers\StudiosController;
use \App\Http\Controllers\CoursesController;

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

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['verified']], function() {
        Route::get('/users', [DashboardController::class, 'index']);
    });
});


Route::get('/admin', function () {
    return view('admin.index');
})->name('admin')->middleware('admin');

//Semesters
Route::get('admin/semesters', [SemestersController::class, 'index'])->name('semesters')->middleware('admin');
Route::get('admin/semesters/{semester:id}', [SemestersController::class, 'index_semester'])->name('semester')->middleware('admin');

//Courses
Route::get('admin/studios/{studio:id}', [StudiosController::class, 'index_courses'])->name('studio')->middleware('admin');

require __DIR__.'/auth.php';
