<?php

namespace App\Http\Controllers;


use App\Http\Controllers\AgeGroupsController;
use App\Models\SemestersModel;
use App\Models\User;
use Illuminate\Http\Request;
use \App\Http\Controllers\SemestersController;

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

    public function index_BlogPosts() {
        $BlogPosts = (new BlogPostsController);
        return view('admin.blog.posts.index', [
            'posts' => $BlogPosts->getBlogPostsList(),
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
