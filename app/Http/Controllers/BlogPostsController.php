<?php

namespace App\Http\Controllers;

use App\Models\BlogPostsModel;
use Illuminate\Http\Request;

class BlogPostsController extends Controller
{
    // Methods
    public function getBlogPostsList() {
        $Posts = BlogPostsModel::get();
        return $Posts;
    }
}
