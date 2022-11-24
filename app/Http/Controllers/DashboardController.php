<?php

namespace App\Http\Controllers;


use App\Http\Controllers\AgeGroupsController;
use App\Http\Controllers\SemestersController;
use App\Models\BannersModel;
use App\Models\BlogCategoriesModel;
use App\Models\BlogPostsModel;
use App\Models\SemestersHolidaysModel;
use App\Models\SemestersModel;
use App\Models\User;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;

class DashboardController extends Controller
{
    // Views
    public function index() {
        return view('admin.index');
    }

    public function index_users() {
        $AgeGroup = (new AgeGroupsController);

        return view('admin.users.index', [
            'users' => $this->getUserList(),
            'AgeGroup' => $AgeGroup,
        ]);
    }

    public function index_teachers() {
        $AgeGroup = (new AgeGroupsController);

        return view('admin.teachers.index', [
            'teachers' => $this->getTeachersList(),
            'AgeGroup' => $AgeGroup,
        ]);
    }

    public function index_students() {
        $AgeGroup = (new AgeGroupsController);

        return view('admin.students.index', [
            'students' => $this->getStudentsList(),
            'AgeGroup' => $AgeGroup,
        ]);
    }

    public function index_AgeGroups() {
        $AgeGroups = (new AgeGroupsController);
        return view('admin.agegroups.index', [
            'AgeGroups' => $AgeGroups->getAgeGroupList(),
        ]);
    }

    public function index_DanceStyles() {
        $DanceStyles = (new DanceStylesController);
        return view('admin.dancestyles.index', [
            'DanceStyles' => $DanceStyles->getDanceStylesList(),
        ]);
    }

    public function index_BlogCategory() {
        $BlogCategories = (new BlogCategoriesController);
        return view('admin.blog.category.index', [
            'categories' => $BlogCategories->getCategoriesList(),
        ]);
    }

    public function add_form_BlogCategory() {
        return view('admin.blog.category.add_form');
    }

    public function edit_form_BlogCategory($id, BlogCategoriesModel $categories) {
        $category = $categories->find($id);

        return view('admin.blog.category.edit_form', [
            'category' => $category,
        ]);
    }

    public function index_BlogPosts($id, BlogCategoriesModel $categories) {
        $posts = $categories->find($id);
        $category = $categories->find($id);
        $BlogPosts = (new BlogPostsController);
        return view('admin.blog.posts.index', [
            'posts' => $posts,
            'category' => $category,
        ]);
    }

    public function add_form_BlogPosts($id, BlogCategoriesModel $categories) {
        $category = $categories->find($id);
        return view('admin.blog.posts.add_form', [
            'category' => $category,
        ]);
    }

    public function edit_form_BlogPosts($id, BlogCategoriesModel $categories, BlogPostsModel $posts, $id2) {
        $post = $posts->find($id2);
        $category = $categories->find($id);
        return view('admin.blog.posts.edit_form', [
            'categories' => $categories->get(),
            'currentCategory' => $category,
            'post' => $post,
        ]);
    }

    public function index_Holidays() {
        $Semesters = (new SemestersController);
        return view('admin.holidays.index', [
            'semesters' => $Semesters->getSemestersList(),
            'currentSemester' => $Semesters->CurrentSemester(),
        ]);
    }

    public function index_HolidaysSemester($id) {
        $Semesters = (new SemestersController);
        return view('admin.holidays.semester', [
            'semester' => $Semesters->getSemesterByID($id),
            'semesters' => $Semesters->getSemestersList(),
            'currentSemester' => $Semesters->CurrentSemester(),
        ]);
    }

    public function add_form_Holiday($id) {
        $Semester = (new SemestersController);
        return view('admin.holidays.add_form', [
            'semester' => $Semester->getSemesterByID($id)
        ]);
    }

    public function edit_form_Holiday($id, SemestersHolidaysModel $holidays) {
        $Semester = (new SemestersController);
        $holiday = $holidays->find($id);
        return view('admin.holidays.edit_form', [
            'semester' => $Semester->getSemesterByID($id),
            'holiday' => $holiday,
        ]);
    }

    public function index_Settings() {
        $countries = CountryListFacade::getList('en');
        return view('admin.settings.index', [
            'countries' => $countries,

        ]);
    }

    public function index_Banners() {
        $banners = (new BannersController);
        return view('admin.banners.index', [
            'banners' => $banners->getBannersList(),
        ]);
    }

    public function add_form_Banners() {
        return view('admin.banners.add_form');
    }

    public function edit_form_Banners($id, BannersModel $banners) {
        $banner = $banners->find($id);
        return view('admin.banners.edit_form',[
            'banner' => $banner,
        ]);
    }

    // Methods
    public function getUserList() {
        $users = User::all();
        return $users;
    }

    public function getTeachersList() {
        $teachers = User::get()->where('role', 'Teacher');
        return $teachers;
    }

    public function getStudentsList() {
        $students = User::get()->where('role', 'Student');
        return $students;
    }

}
