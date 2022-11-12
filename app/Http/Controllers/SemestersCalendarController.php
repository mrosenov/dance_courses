<?php

namespace App\Http\Controllers;

use App\Models\SemestersModel;
use Illuminate\Http\Request;

class SemestersCalendarController extends Controller
{
    // Views
    public function index(SemestersModel $semesters) {
        $SemestersController = (new SemestersController);

        return view('admin.calendar.index', [
            'semesters' => $semesters->orderBy('id','desc')->get(),
            'currentSemester' => $SemestersController->CurrentSemester(),
        ]);
    }

    public function calendar($id, SemestersModel $semesters) {
        $studios = $semesters::find($id)->Studios;
        $semester = $semesters::find($id);
        $SemestersController = (new SemestersController);

        return view('admin.calendar.calendar', [
            'studios' => $studios,
            'semesters' => $semesters->orderBy('id','desc')->get(),
            'semester' => $semester,
            'currentSemester' => $SemestersController->CurrentSemester(),
        ]);
    }

}
