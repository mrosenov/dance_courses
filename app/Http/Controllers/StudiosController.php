<?php

namespace App\Http\Controllers;

use App\Models\SemestersModel;
use App\Models\StudiosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class StudiosController extends Controller
{

    // Methods
    public function store($semesterID, Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $studio = new StudiosModel();

        if (DB::table('studios')->where('semester', $semesterID)->where('name', $request->name)->exists()) {
            return redirect::back()->with('error', $request->name.' already exists please choose other name.');
        }

        $studio->name = $request->name;
        $studio->semester = $semesterID;
        $studio->active = $request->active;
        $studio->save();

        return redirect::back()->with('success', $studio->name.' have been successfully added.');
    }

    public function update($semesterID, $studioID, Request $request, StudiosModel $studios) {
        $this->validate($request, [
           'name' => 'required',
           'semester' => 'required',
        ]);

        $studio = $studios->find($studioID);

        $studio->name = $request->name;
        $studio->semester = $request->semester;
        $studio->active = $request->active;
        $studio->update();

        return redirect::back()->with('success', $studio->name.' have been successfully updated.');
    }

    public function destroy($semesterID,$studioID, StudiosModel $studios) {
        $studio = $studios->find($studioID);
        $studio->delete();

        return redirect::back()->with('success', $studio->name.' have been successfully deleted.');
    }
}
