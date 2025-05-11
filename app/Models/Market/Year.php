<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Year extends Model
{
    use SoftDeletes;


    protected $fillable = ['name','status'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
