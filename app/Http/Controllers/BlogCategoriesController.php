<?php

namespace App\Http\Controllers;

use App\Models\BlogCategoriesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BlogCategoriesController extends Controller
{
    // Views
    public function view_category($slug, BlogCategoriesModel $categories) {
        $category = $categories->where('slug', $slug)->first();
        $posts = $category->getPosts()->paginate(12);
        return view('category', [
            'category' => $category,
            'posts' => $posts,
        ]);
    }

    // Methods
    public function store(Request $request) {
        $this->validate($request, [
           'name' => 'required',
           'slug' => 'required',
        ]);

        $category = new BlogCategoriesModel();

        if (DB::table('blog_categories')->where('slug', $request->slug)->exists()) {
            return redirect::back()->with('error', 'There is category with such '.$request->slug. ' slug.');
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect::back()->with('success', $category->name.' have been created successfully.');
    }

    public function update($id,Request $request,BlogCategoriesModel $categories) {
        $category = $categories->find($id);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->update();

        return redirect::back()->with('success', $category->name.' have been successfully updated.');
    }

    public function destroy($id, BlogCategoriesModel $categories) {
        $category = $categories->find($id);
        $category->delete();

        return redirect::back()->with('success', $category->name.' have been successfully deleted.');
    }

    public function getCategoriesList() {
        $categories = BlogCategoriesModel::get();
        return $categories;
    }
}
