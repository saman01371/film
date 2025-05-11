<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Market\Product;

class Gallery extends Model
{
    protected $table = 'product_images';

    use  SoftDeletes;

    protected $fillable = ['image', 'product_id'];

    protected $casts = ['image' => 'array'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
