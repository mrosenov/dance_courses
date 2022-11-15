<?php

namespace App\Http\Controllers;

use App\Models\BlogCategoriesModel;
use Illuminate\Http\Request;

class BlogCategoriesController extends Controller
{
    // Methods
    public function getCategoriesList() {
        $categories = BlogCategoriesModel::get();
        return $categories;
    }
}
