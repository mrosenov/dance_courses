<?php

namespace App\Http\Controllers;

use App\Models\SiteSettingsModels;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    // Methods
    public function getSiteSettings() {
        $settings = SiteSettingsModels::get()->first();
        return $settings;
    }
}
