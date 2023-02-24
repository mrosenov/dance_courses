<?php

namespace App\Http\Controllers;

use App\Models\SiteSettingsModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class SiteSettingsController extends Controller
{
    // Methods
    public function getSiteSettings() {
        $settings = SiteSettingsModels::get()->first();
        return $settings;
    }

    public function update(Request $request) {
//        $this->validate($request,[
//            'sitename' => 'required',
//            'country' => 'required',
//            'sitetown' => 'required',
//            'sitepostcode' => 'required',
//            'siteaddress' => 'required',
//            'siteemail' => 'required',
//            'sitevatid' => 'required',
//            'site_logo' => 'max:2048',
//        ]);

        $site = SiteSettingsModels::find(1);

        $site->name = $request->sitename;
        $site->country = $request->country;
        $site->postcode = $request->sitepostcode;
        $site->address = $request->siteaddress;
        $site->email = $request->siteemail;
        $site->phone = $request->sitephone;
        $site->VATNumber = $request->sitevatid;

        $image = $request->file('site_logo');

        if ($request->hasFile($image)) {
            $input['imagename'] = time() . '_' . $request->site_logo->getClientOriginalName();
            $destinationPath = public_path('/thumbnail');

            $img = Image::make($image->path());

            $img->resize(221, 244, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);

            $destinationPath = public_path('/tmp');
            $image->move($destinationPath, $input['imagename']);

            $site->logo = '/thumbnail/' . $input['imagename'];
        }
        $site->youtube = $request->siteyoutube;
        $site->facebook = $request->sitefacebook;
        $site->instagram = $request->siteinstagram;

        $site->update();
        return redirect::back()->with('success', 'Site settings updated successfully');
    }
}
