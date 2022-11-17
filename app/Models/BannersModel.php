<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannersModel extends Model
{
    use HasFactory;

    protected $fillable = ['name','top_title','title','short_description','url','file_name','file_path','active_from','active_to','active'];
    protected $table = "banners";
}
