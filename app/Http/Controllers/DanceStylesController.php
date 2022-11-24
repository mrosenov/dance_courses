<?php

namespace App\Http\Controllers;

use App\Models\DanceStylesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DanceStylesController extends Controller
{
    // Methods
    public function store(Request $request) {
        $this->validate($request, [
           'name' => 'required',
           'description' => 'required',
        ]);

        $dance = new DanceStylesModel();

        if (DB::table('dance_styles')->where('name', $request->name)->exists()) {
            return redirect::back()->with('error', $request->name.' already exists.');
        }

        $dance->name = $request->name;
        $dance->description = $request->description;
        $dance->active = $request->active;
        $dance->save();

        return redirect::back()->with('success', $dance->name.' have been successfully added.');
    }

    public function update($id, Request $request, DanceStylesModel $dances) {
        $this->validate($request, [
           'name' => 'required',
           'description' => 'required',
        ]);

        $dance = $dances->find($id);

        if (DB::table('dance_styles')->where('id', '!=', $id)->where('name', $request->name)->exists()) {
            return redirect::back()->with('error', $request->name.' already exists, please choose other name.');
        }

        $dance->name = $request->name;
        $dance->description = $request->description;
        $dance->active = $request->active;
        $dance->save();

        return redirect::back()->with('success', $dance->name.' have been updated successfully.');
    }

    public function destroy($id, DanceStylesModel $dances) {
        $dance = $dances->find($id);
        $dance->delete();

        return redirect::back()->with('success', $dance->name.' have been successfully deleted.');
    }

    public function getDanceStylesList() {
        $DanceStyles = DanceStylesModel::get();
        return $DanceStyles;
    }
}
