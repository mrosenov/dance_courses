<?php

namespace App\Http\Controllers;

use App\Models\SemestersModel;
use App\Models\StudiosModel;
use Illuminate\Http\Request;

class StudiosController extends Controller
{
    // View
    public function index_courses($id,StudiosModel $studios) {
        return view('admin.courses.index', [
            'studio' => $this->getStudio($id),
            'courses' => $this->getCourses($id),
        ]);
    }

    // Methods
    public function getCourses($id) {
        return StudiosModel::find($id)->Courses;
    }

    public function getStudio($id) {
        return StudiosModel::find($id);
    }
}
