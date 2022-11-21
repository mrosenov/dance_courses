<?php

namespace App\Http\Controllers;

use App\Models\SemestersHolidaysModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SemestersHolidaysController extends Controller
{
    // Methods
    public function getHolidaysList() {
        $Holidays = SemestersHolidaysModel::get();
        return $Holidays;
    }

    public function store($id,Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'short_description' => 'required',
            'holiday_from' => 'required',
            'holiday_to' => 'required',
        ]);

        $holiday = new SemestersHolidaysModel();

        $holiday->name = $request->name;
        $holiday->description = $request->short_description;
        $holiday->semester = $id;
        $holiday->holiday_from = $request->holiday_from;
        $holiday->holiday_to = $request->holiday_to;
        $holiday->save();

        return redirect::back()->with('success', $holiday->name.' have been added successfully');
    }
}
