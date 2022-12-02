<?php

namespace App\Http\Controllers;


use App\Http\Controllers\AgeGroupsController;
use App\Http\Controllers\SemestersController;
use App\Models\AgeGroupsModel;
use App\Models\BannersModel;
use App\Models\BlogCategoriesModel;
use App\Models\BlogPostsModel;
use App\Models\CoursesModel;
use App\Models\DanceStylesModel;
use App\Models\SemestersHolidaysModel;
use App\Models\SemestersModel;
use App\Models\StudiosModel;
use App\Models\TeachersModel;
use App\Models\User;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;

class DashboardController extends Controller
{
    // Views
    public function index() {
        return view('admin.index');
    }

    public function index_Semesters(SemestersModel $semesters) {
        $semester = (new SemestersController);
        return view('admin.semesters.index', [
            'semesters' => $semesters::orderBy("semester_start", "desc")->paginate(10),
            'prev' => $semester->PreviousSemester(),
            'current' => $semester->CurrentSemester(),
            'next' => $semester->NextSemester(),
        ]);
    }

    public function add_form_Semester() {
        return view('admin.semesters.add_form');
    }

    public function edit_form_Semester($id, SemestersModel $semesters) {
        $semester = $semesters->find($id);
        return view('admin.semesters.edit_form', [
            'semester' => $semester,
        ]);
    }

    public function index_Studios($id, SemestersModel $semesters) {
        $semester = $semesters::find($id);
        return view('admin.studios.index', [
            'semester' => $semester,
        ]);
    }

    public function add_form_Studio($semesterID, SemestersModel $semesters) {
        $semester = $semesters->find($semesterID);
        return view('admin.studios.add_form', [
            'semester' => $semester,
        ]);
    }

    public function edit_form_Studio($semesterID,$studioID, SemestersModel $semesters, StudiosModel $studios) {

        $semester = $semesters->find($semesterID);
        $studio = $studios->find($studioID);

        return view('admin.studios.edit_form', [
            'semesters' => $semesters->get(),
            'semester' => $semester,
            'studio' => $studio,
        ]);
    }

    public function index_Courses($semesterID,$studioID,StudiosModel $studios) {
        $studio = $studios->find($studioID);

        return view('admin.courses.index', [
            'studio' => $studio,
        ]);
    }

    public function add_form_Course($semesterID,$studioID,DanceStylesModel $dances, TeachersModel $teachers, AgeGroupsModel $AgeGroups, SemestersModel $semesters, StudiosModel $studios) {
        $semester = $semesters->find($semesterID);
        $studio = $studios->find($studioID);

        return view('admin.courses.add_form', [
            'dances' => $dances->get(),
            'teachers' => $teachers->get(),
            'AgeGroups' => $AgeGroups->get(),
            'semester' => $semester,
            'studio' => $studio,
        ]);
    }

    public function edit_form_Course($semesterID,$studioID,$courseID,CoursesModel $courses,DanceStylesModel $dances, TeachersModel $teachers, AgeGroupsModel $AgeGroups, SemestersModel $semesters, StudiosModel $studios) {
        $course = $courses->find($courseID);

        return view('admin.courses.edit_form', [
            'course' => $course,
            'dances' => $dances->get(),
            'teachers' => $teachers->get(),
            'AgeGroups' => $AgeGroups->get(),
            'semesters' => $semesters->get(),
            'studios' => $studios->get(),
        ]);
    }

    public function index_users() {
        $AgeGroup = (new AgeGroupsController);

        return view('admin.users.index', [
            'users' => $this->getUserList()->where('role', 'Admin'),
            'AgeGroup' => $AgeGroup,
        ]);
    }

    public function edit_form_Users($id, User $users) {
        $user = $users->find($id);
        $countries = CountryListFacade::getList('en');
        $dances = (new DanceStylesController);

        return view('admin.users.edit_form',[
            'user' => $user,
            'countries' => $countries,
            'dances' => $dances->getDanceStylesList(),
        ]);
    }

    public function index_teachers() {
        $AgeGroup = (new AgeGroupsController);

        return view('admin.teachers.index', [
            'teachers' => $this->getUserList()->where('role', 'Teacher'),
            'AgeGroup' => $AgeGroup,
        ]);
    }

    public function edit_form_Teachers($id, User $users) {
        $teacher = $users->find($id);
        $countries = CountryListFacade::getList('en');
        $dances = (new DanceStylesController);

        return view('admin.teachers.edit_form',[
            'teacher' => $teacher,
            'countries' => $countries,
            'dances' => $dances->getDanceStylesList(),
        ]);
    }

    public function index_students() {
        $AgeGroup = (new AgeGroupsController);

        return view('admin.students.index', [
            'students' => $this->getUserList()->where('role', 'Student'),
            'AgeGroup' => $AgeGroup,
        ]);
    }

    public function edit_form_Students($id, User $users) {
        $student = $users->find($id);
        $countries = CountryListFacade::getList('en');
        $dances = (new DanceStylesController);

        return view('admin.students.edit_form',[
            'student' => $student,
            'countries' => $countries,
            'dances' => $dances->getDanceStylesList(),
        ]);
    }

    public function index_AgeGroups() {
        $AgeGroups = (new AgeGroupsController);
        return view('admin.agegroups.index', [
            'AgeGroups' => $AgeGroups->getAgeGroupList(),
        ]);
    }

    public function add_form_AgeGroups() {
        return view('admin.agegroups.add_form');
    }

    public function edit_form_AgeGroups($id, AgeGroupsModel $AgeGroups) {
        $AgeGroup = $AgeGroups->find($id);
        return view('admin.agegroups.edit_form', [
            'agegroup' => $AgeGroup,
        ]);
    }

    public function index_DanceStyles() {
        $DanceStyles = (new DanceStylesController);
        return view('admin.dancestyles.index', [
            'DanceStyles' => $DanceStyles->getDanceStylesList(),
        ]);
    }

    public function add_form_DanceStyles() {
        return view('admin.dancestyles.add_form');
    }

    public function edit_form_DanceStyles($id, DanceStylesModel $styles) {
        $style = $styles->find($id);
        return view('admin.dancestyles.edit_form', [
            'style' => $style,
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
}
