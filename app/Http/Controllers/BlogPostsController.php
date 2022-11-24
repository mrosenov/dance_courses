<?php

namespace App\Http\Controllers;

use App\Models\BlogPostsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogPostsController extends Controller
{
    // Methods
    public function store($id,Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);

        $post = new BlogPostsModel();

        $post->name = $request->name;
        $post->slug = $request->slug;
        $post->content = $request->postcontent;
        $post->category = $id;
        $post->author = auth()->id();
        $post->save();

        return redirect::back()->with('success', $post->name.' have been successfully added.');
    }

    public function getBlogPostsList() {
        $Posts = BlogPostsModel::get();
        return $Posts;
    }
}
