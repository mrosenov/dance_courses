<?php

namespace App\Http\Controllers;

use App\Models\BannersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BannersController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,png|max:2048'
        ]);

        $banner = new BannersModel();
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

        $banner->name = $request->name;
        $banner->top_title = $request->top_title;
        $banner->title = $request->title;
        $banner->short_description = $request->short_description;
        $banner->file_name = time().'_'.$request->file->getClientOriginalName();
        $banner->file_path = '/storage/' . $filePath;
        $banner->url = $request->url;
        $banner->active_from = $request->active_from;
        $banner->active_to = $request->active_to;
        $banner->active = $request->active;

        $banner->save();
        return redirect::back()->with('success','Banner have been successfully created.');
    }

    public function getBannersList() {
        $banners = BannersModel::get();
        return $banners;
    }
}
