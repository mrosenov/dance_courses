<?php

namespace App\Http\Controllers;

use App\Models\DanceStylesModel;
use Illuminate\Http\Request;

class DanceStylesController extends Controller
{
    // Methods
    public function getDanceStylesList() {
        $DanceStyles = DanceStylesModel::get();
        return $DanceStyles;
    }
}
