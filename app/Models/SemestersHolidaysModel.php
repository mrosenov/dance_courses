<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemestersHolidaysModel extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','semester','holiday_from','holiday_to'];
    protected $table = "semesters_holidays";
}
