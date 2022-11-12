<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use App\Models\StudiosModel;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // Views
    public function index($id,CoursesModel $courses) {
        $course = $courses::find($id);
        return view('admin.course.index', [
            'course' => $course,
        ]);
    }
}
