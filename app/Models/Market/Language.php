<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;


    protected $fillable = ['name','status'];

    public function languages()
    {
        return $this->hasMany(Language::class);
    }
}
