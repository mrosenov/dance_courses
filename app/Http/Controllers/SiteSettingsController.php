<?php

namespace App\Http\Controllers;

use App\Models\SiteSettingsModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SiteSettingsController extends Controller
{
    // Methods
    public function getSiteSettings() {
        $settings = SiteSettingsModels::get()->first();
        return $settings;
    }

    public function update(Request $request) {
        $this->validate($request,[
            'sitename' => 'required',
            'country' => 'required',
            'sitetown' => 'required',
            'sitepostcode' => 'required',
            'siteaddress' => 'required',
            'siteemail' => 'required',
            'sitevatid' => 'required',
        ]);

        $site = SiteSettingsModels::find(1);

        $site->name = $request->sitename;
        $site->country = $request->country;
        $site->postcode = $request->sitepostcode;
        $site->address = $request->siteaddress;
        $site->email = $request->siteemail;
        $site->VATNumber = $request->sitevatid;
        $site->youtube = $request->siteyoutube;
        $site->facebook = $request->sitefacebook;
        $site->instagram = $request->siteinstagram;

        $site->update();
        return redirect::back()->with('success', 'Site settings updated successfully');
    }
}
