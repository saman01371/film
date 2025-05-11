<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $casts = ['logo' => 'array', 'icon' => 'array'];


    protected $fillable = ['title', 'description', 'keywords', 'logo', 'icon'];
}
