<?php

namespace App\Http\Controllers;

use App\Models\CoursesModel;
use App\Models\SemestersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SemestersController extends Controller
{
    // Methods
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'semester_start' => 'required|date',
            'semester_end' => 'required|date',
        ]);

        $semester = new SemestersModel();

        $semester->name = $request->name;
        $semester->semester_start = $request->semester_start;
        $semester->semester_end = $request->semester_end;
        $semester->active = $request->active;
        $semester->save();

        return redirect::back()->with('success', $semester->name.' have been successfully added.');
    }

    public function update($id, Request $request, SemestersModel $semesters) {
        $this->validate($request, [
            'name' => 'required',
            'semester_start' => 'required|date',
            'semester_end' => 'required|date',
        ]);

        $semester = $semesters->find($id);

        $semester->name = $request->name;
        $semester->semester_start = $request->semester_start;
        $semester->semester_end = $request->semester_end;
        $semester->active = $request->active;
        $semester->update();

        return redirect::back()->with('success', $semester->name.' have been successfully updated.');
    }

    public function destroy($id, SemestersModel $semesters) {
        $semester = $semesters->find($id);
        $semester->delete();

        return redirect::back()->with('success', $semester->name.' have been successfully deleted.');
    }

    public function PreviousSemester() {
        $semester = new SemestersModel();
        return $semester->where('semester_end', '<=', date("Y/m/d H:i:s"))->where('active', 1)->latest()->first();
    }

    public function CurrentSemester() {
        $semester = new SemestersModel();
        return $semester->where('semester_start', '<=', date("Y/m/d H:i:s"))->where('semester_end', '>=', date("Y/m/d H:i:s"))->where('active', 1)->first();
    }

    public function NextSemester() {
        $semester = new SemestersModel();
        return $semester->where('semester_start', '>=', date("Y/m/d H:i:s"))->where('semester_end', '>=', date("Y/m/d H:i:s"))->where('active', 1)->latest()->first();
    }

    public function getSemesterByID($semesterID) {
        $semester = SemestersModel::find($semesterID);
        return $semester;
    }

    public function getSemestersList() {
        $semesters = SemestersModel::get();
        return $semesters;
    }

}
