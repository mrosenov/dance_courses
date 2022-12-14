<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgeGroupsModel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'active'];
    protected $table = "age_groups";

    public function Courses() {
        return $this->hasMany(CoursesModel::class, 'age_group', 'id');
    }
}
