<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Views

    public function index_home() {
        $banners = new BannersController;
        $blogs = new BlogPostsController;

        return view('index', [
            'banners' => $banners->getBanners(),
            'posts' => $blogs->getPostsList(),
        ]);
    }
}
