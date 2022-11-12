<?php

namespace App\Http\Controllers;


use App\Models\SemestersModel;
use App\Models\User;
use Illuminate\Http\Request;
use \App\Http\Controllers\AgeGroupsController;
use \App\Http\Controllers\SemestersController;

class DashboardController extends Controller
{
    public function index(User $users)
    {
        $AgeGroup = (new AgeGroupsController);
        return view('admin.index', [
            'users' => $users->get(),
            'AgeGroup' => $AgeGroup,
        ]);
    }
}
