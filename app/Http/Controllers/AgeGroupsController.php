<?php

namespace App\Http\Controllers;

use App\Models\AgeGroupsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AgeGroupsController extends Controller
{
    // Methods
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $AgeGroup = new AgeGroupsModel();

        if (DB::table('age_groups')->where('name', $request->name)->exists()) {
            return redirect::back()->with('error', $AgeGroup->name.' already exists.');
        }

        $AgeGroup->name = $request->name;
        $AgeGroup->description = $request->description;
        $AgeGroup->active = $request->active;
        $AgeGroup->save();

        return redirect::back()->with('success', $AgeGroup->name.' have been successfully added.');
    }

    public function update($id, Request $request, AgeGroupsModel $AgeGroups) {
        $this->validate($request, [
           'name' => 'required',
           'description' => 'required',
        ]);

        $AgeGroup = $AgeGroups->find($id);

        if (DB::table('age_groups')->where('id', '!=', $id)->where('name', $request->name)->exists()) {
            return redirect::back()->with('error', $request->name.' already exists, please choose other name.');
        }

        $AgeGroup->name = $request->name;
        $AgeGroup->description = $request->description;
        $AgeGroup->active = $request->active;
        $AgeGroup->update();

        return redirect::back()->with('success', $AgeGroup->name.' have been successfully added.');
    }

    public function destroy($id, AgeGroupsModel $AgeGroups) {
        $AgeGroup = $AgeGroups->find($id);
        $AgeGroup->delete();

        return redirect::back()->with('success', $AgeGroup->name.' have been successfully deleted.');
    }

    public function StudentAge($birthday) {
        return Carbon::parse($birthday)->age;
    }

    public function getAgeGroupList() {
        $AgeGroup = AgeGroupsModel::get();
        return $AgeGroup;
    }
}
