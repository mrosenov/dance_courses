<?php

namespace App\Http\Controllers;

use App\Models\BlogPostsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BlogPostsController extends Controller
{
    // Views
    public function view_posts(BlogPostsModel $posts) {
        return view('posts', [
            'posts' => $posts->paginate(12),
        ]);
    }

    public function view_post($slug, BlogPostsModel $posts) {
        $post = $posts->where('slug', $slug)->first();
        $previous = $posts->where('id', '<', $post->id)->first();
        $next = $posts->where('id', '>', $post->id)->first();
        return view('post', [
            'post' => $post,
            'previous_post' => $previous,
            'next_post' => $next,
        ]);
    }


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

    public function update($categoryID, Request $request, BlogPostsModel $posts, $postID) {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
            'category' => 'required',
            'postcontent' => 'required'
        ]);

        $post = $posts->find($postID);

        $post->name = $request->name;
        $post->slug = $request->slug;
        $post->content = $request->postcontent;
        $post->category = $request->category;
        $post->author = auth()->id();
        $post->save();

        return redirect::back()->with('success', $post->name.' have been updated successfully');
    }

    public function destroy($categoryID, BlogPostsModel $posts, $postID) {
        $post = $posts->find($postID);
        $post->delete();

        return redirect::back()->with('success', $post->name.' have been deleted successfully');
    }

    public function getPostsList() {
        $Posts = BlogPostsModel::orderBy('created_at', 'desc')->get();
        return $Posts;
    }
}
