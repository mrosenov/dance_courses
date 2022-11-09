<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudiosModel extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = "studios";

    public function Courses() {
        return $this->hasMany(CoursesModel::class, 'studio', 'id');
    }

    public function Semester() {
        return $this->belongsTo(SemestersModel::class, 'semester', 'id');
    }
}
