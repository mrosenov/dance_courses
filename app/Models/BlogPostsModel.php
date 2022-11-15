<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostsModel extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','content','category','author'];
    protected $table = "blog_posts";
}
