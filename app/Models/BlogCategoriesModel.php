<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategoriesModel extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];
    protected $table = "blog_categories";

    public function getPosts() {
        return $this->hasMany(BlogPostsModel::class, 'category', 'id');
    }
}
