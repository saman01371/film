<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVideo extends Model
{
    use  SoftDeletes;

    protected $guarded;
    protected $table='product_videos';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
