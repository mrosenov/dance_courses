<?php

namespace App\Http\Controllers;

use App\Models\BannersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class BannersController extends Controller
{
    public function getBanners() {
        $banners = BannersModel::where('active_from', '<=', date("Y-m-d H:i:s"))->where('active_to', '>=',date("Y-m-d H:i:s"))->where('active', 1)->get();

        return $banners;
    }

    public function getBannersList() {
        $banners = BannersModel::get();

        return $banners;
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'short_description' => 'max: 142',
            'active_from' => 'required|date',
            'active_to' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $banner = new BannersModel();
        $fileName = time().'_'.$request->image->getClientOriginalName();
        $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');

        $banner->name = $request->name;
        $banner->title = $request->title;
        $banner->short_description = $request->short_description;
        $banner->file_name = time().'_'.$request->image->getClientOriginalName();
        $banner->file_path = '/storage/' . $filePath;
        $banner->url = $request->url;
        $banner->active_from = $request->active_from;
        $banner->active_to = $request->active_to;
        $banner->active = $request->active;

        $banner->save();
        return redirect::back()->with('success','Banner have been successfully created.');
    }
}
