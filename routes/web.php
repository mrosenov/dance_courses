<?php


use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\SemestersController;
use \App\Http\Controllers\StudiosController;
use \App\Http\Controllers\CoursesController;
use \App\Http\Controllers\SemestersCalendarController;
use \App\Http\Controllers\BannersController;
use \App\Http\Controllers\SiteSettingsController;
use \App\Http\Controllers\SemestersHolidaysController;
use \App\Http\Controllers\BlogPostsController;
use \App\Http\Controllers\BlogCategoriesController;
use \App\Http\Controllers\DanceStylesController;

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
    $banners = (new BannersController);
    return view('index', [
        'banners' => $banners->getBanners(),
    ]);
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
    Route::get('admin/dance_style/add', [DashboardController::class, 'add_form_DanceStyles'])->name('add-dance-styles')->middleware('admin');
    Route::get('admin/dance_style/{style:id}', [DashboardController::class, 'edit_form_DanceStyles'])->name('edit-dance-styles-form')->middleware('admin');

    Route::post('admin/dance_style/add', [DanceStylesController::class, 'store'])->name('store-dance-style')->middleware('admin');
    Route::patch('admin/dance_style/{style:id}', [DanceStylesController::class, 'update'])->name('update-dance-style')->middleware('admin');
    Route::get('admin/dance_style/{style:id}/delete', [DanceStylesController::class, 'destroy'])->name('delete-dance-style')->middleware('admin');

    // Blog Category
    Route::get('admin/blog_category', [DashboardController::class, 'index_BlogCategory'])->name('blog-category')->middleware('admin');
    Route::get('admin/blog_category/add', [DashboardController::class, 'add_form_BlogCategory'])->name('add-blog-category')->middleware('admin');
    Route::get('admin/blog_category/{blog_category:id}', [DashboardController::class, 'edit_form_BlogCategory'])->name('edit-blog-category-form')->middleware('admin');

    Route::post('admin/blog_category/add', [BlogCategoriesController::class, 'store'])->name('store-blog-category')->middleware('admin');
    Route::patch('admin/blog_category/{blog_category:id}/edit', [BlogCategoriesController::class, 'update'])->name('update-blog-category')->middleware('admin');
    Route::get('admin/blog_category/{blog_category:id}/delete', [BlogCategoriesController::class, 'destroy'])->name('delete-blog-category')->middleware('admin');

    // Blog Posts
    Route::get('admin/blog_category/{blog_category:id}/posts', [DashboardController::class, 'index_BlogPosts'])->name('blog-posts')->middleware('admin');
    Route::get('admin/blog_category/{blog_category:id}/post/add', [DashboardController::class, 'add_form_BlogPosts'])->name('add-blog-post')->middleware('admin');
    Route::get('admin/blog_category/{blog_category:id}/post/{post:id}', [DashboardController::class, 'edit_form_BlogPosts'])->name('edit-blog-post-form')->middleware('admin');

    Route::post('admin/blog_category/{blog_category:id}/post/add', [BlogPostsController::class, 'store'])->name('store-blog-post')->middleware('admin');
    Route::patch('admin/blog_category/{blog_category:id}/post/{post:id}/edit', [BlogPostsController::class, 'update'])->name('update-blog-post')->middleware('admin');
    Route::get('admin/blog_category/{blog_category:id}/post/{post:id}/delete', [BlogPostsController::class, 'destroy'])->name('delete-blog-post')->middleware('admin');

    // Holidays
    Route::get('admin/holidays', [DashboardController::class, 'index_Holidays'])->name('holidays')->middleware('admin');
    Route::get('admin/holidays/semester/{semester:id}', [DashboardController::class, 'index_HolidaysSemester'])->name('holidays-semester')->middleware('admin');
    Route::get('admin/holidays/semester/{semester:id}/add', [DashboardController::class, 'add_form_Holiday'])->name('add-holiday')->middleware('admin');
    Route::get('admin/holiday/{holiday:id}', [DashboardController::class, 'edit_form_Holiday'])->name('edit-holiday-form')->middleware('admin');

    Route::post('admin/holidays/semester/{semester:id}/add', [SemestersHolidaysController::class, 'store'])->name('store-holiday')->middleware('admin');
    Route::patch('admin/holiday/{holiday:id}/edit', [SemestersHolidaysController::class, 'update'])->name('update-holiday')->middleware('admin');
    Route::get('admin/holiday/{holiday:id}/delete', [SemestersHolidaysController::class, 'destroy'])->name('delete-holiday')->middleware('admin');


    // Settings
    Route::get('admin/settings', [DashboardController::class, 'index_Settings'])->name('settings')->middleware('admin');

    Route::patch('admin/settings/edit', [SiteSettingsController::class, 'update'])->name('update-site')->middleware('admin');

    // Banners
    Route::get('admin/banners', [DashboardController::class, 'index_Banners'])->name('banners')->middleware('admin');
    Route::get('admin/banner/{banner:id}', [DashboardController::class, 'edit_form_Banners'])->name('edit-banner-form')->middleware('admin');
    Route::get('admin/banners/add', [DashboardController::class, 'add_form_Banners'])->name('add-banner')->middleware('admin');

    Route::post('admin/banners/add', [BannersController::class, 'store'])->name('store-banner');
    Route::patch('admin/banner/{banner:id}/edit', [BannersController::class, 'update'])->name('update-banner')->middleware('admin');
    Route::get('admin/banner/{banner:id}/delete', [BannersController::class, 'destroy'])->name('delete-banner')->middleware('admin');
});

require __DIR__.'/auth.php';
