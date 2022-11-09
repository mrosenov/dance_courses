<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use App\Models\SemestersModel;
use Illuminate\Http\Request;

class SemestersController extends Controller
{
    // Views
    public function index(SemestersModel $semesters) {
        return view('admin.semesters.index', [
            'semesters' => $semesters::all(),
            'prev' => $this->PreviousSemester(),
            'current' => $this->CurrentSemester(),
            'next' => $this->NextSemester(),
        ]);
    }

    public function index_semester($id, SemestersModel $semesters) {
        $semester = $semesters::find($id);
        return view('admin.semester.index', [
            'semester' => $semester,
        ]);
    }

    // Methods
    public function PreviousSemester() {
        $semester = new SemestersModel();
        return $semester->where('semester_end', '<=', date("Y/m/d H:i:s"))->latest()->first();
    }

    public function CurrentSemester() {
        $semester = new SemestersModel();
        return $semester->where('semester_start', '<=', date("Y/m/d H:i:s"))->where('semester_end', '>=', date("Y/m/d H:i:s"))->first();
    }

    public function NextSemester() {
        $semester = new SemestersModel();
        return $semester->where('semester_start', '>=', date("Y/m/d H:i:s"))->where('semester_end', '>=', date("Y/m/d H:i:s"))->where('active', 1)->latest()->first();
    }

}
