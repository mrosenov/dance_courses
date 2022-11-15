<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettingsModels extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = "site_settings";
}
