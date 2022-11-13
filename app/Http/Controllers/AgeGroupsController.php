<?php

namespace App\Http\Controllers;

use App\Models\AgeGroupsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AgeGroupsController extends Controller
{
    // Methods
    public function StudentAge($birthday) {
        return Carbon::parse($birthday)->age;
    }

    public function getAgeGroupList() {
        $AgeGroup = AgeGroupsModel::get();
        return $AgeGroup;
    }
}
