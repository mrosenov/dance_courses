<?php

namespace App\Http\Controllers;

use App\Models\SemestersModel;
use Illuminate\Http\Request;

class SemestersCalendarController extends Controller
{
    // Views
    public function index(SemestersModel $semesters) {
        return view('admin.calendar.index', [
            'semesters' => $semesters->orderBy('id','desc')->get(),
        ]);
    }

    public function calendar($id, SemestersModel $semesters) {
        $studios = $semesters::find($id)->Studios;
        $semester = $semesters::find($id);
        return view('admin.calendar.calendar', [
            'studios' => $studios,
            'semester' => $semester,
        ]);
    }
}
