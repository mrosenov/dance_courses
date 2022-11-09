<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachersModel extends Model
{
    use HasFactory;

    protected $fillable = ['user', 'dance_style', 'description', 'active'];
    protected $table = "teachers";

    public function UserInfo() {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
