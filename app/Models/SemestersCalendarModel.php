<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemestersCalendarModel extends Model
{
    use HasFactory;

    protected $fillable = ['semester', 'studio', 'course','weekday'];
    protected $table = "semesters_calendar";

    public function Course() {
        return $this->belongsTo(CoursesModel::class,'course', 'id');
    }
}
