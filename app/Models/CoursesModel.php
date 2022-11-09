<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'semester',
        'studio',
        'dance_style',
        'teacher',
        'age_group',
        'level',
        'free_places',
        'course_start',
        'course_end',
        'course_register_start' ,
        'course_register_end',
        'price',
        'weekday',
        'active'
    ];

    protected $table = "courses";

    public function Semester() {
        return $this->belongsTo(SemestersModel::class, 'semester', 'id');
    }

    public function Studio() {
        return $this->belongsTo(StudiosModel::class, 'studio', 'id');
    }

    public function DanceStyle() {
        return $this->belongsTo(DanceStylesModel::class, 'dance_style', 'id');
    }

    public function Teacher() {
        return $this->belongsTo(TeachersModel::class, 'teacher', 'id');
    }

    public function AgeGroup() {
        return $this->belongsTo(AgeGroupsModel::class, 'age_group', 'id');
    }
}
