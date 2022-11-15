<?php

namespace App\Http\Controllers;

use App\Models\SemestersHolidaysModel;
use Illuminate\Http\Request;

class SemestersHolidaysController extends Controller
{
    // Methods
    public function getHolidaysList() {
        $Holidays = SemestersHolidaysModel::get();
        return $Holidays;
    }
}
