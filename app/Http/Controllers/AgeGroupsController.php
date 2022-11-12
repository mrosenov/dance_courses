<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AgeGroupsController extends Controller
{
    // Methods
    public static function StudentAge($birthday) {
        return Carbon::parse($birthday)->age;
    }
}
