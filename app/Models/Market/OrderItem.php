<?php

namespace App\Models\Market;


use App\Models\Market\Product;
use App\Models\Market\AmazingSale;
use App\Models\Market\ProductColor;
use App\Models\Market\OrderItemSelectedAttribute;
use App\Models\Market\Guarantee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function product_video()
    {
        return $this->belongsTo(ProductVideo::class);
    }

    public function singleProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
