<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemestersModel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'semester_start', 'semester_end', 'active'];
    protected $casts = [
        'semester_start' => 'datetime',
        'semester_end' => 'datetime',
        ];
    protected $table = "semesters";

    public function Studios() {
        return $this->hasMany(StudiosModel::class, 'semester', 'id');
    }
}
