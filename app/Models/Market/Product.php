<?php

namespace App\Models\Market;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Market\ProductCategory;

use App\Models\Market\Gallery;

class Product extends Model
{
    use SoftDeletes;

    protected $casts = ['image' => 'array'];

    protected $fillable = ['name', 'view', 'duration', 'summary', 'slug', 'image', 'status', 'tags', 'story', 'video', 'price' , 'category_id', 'published_at', 'actors'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }


    public function images()
    {
        return $this->hasMany(Gallery::class);
    }

    public function videos()
    {
        return $this->hasMany(ProductVideo::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Content\Comment', 'commentable');
    }


    public function activeComments()
    {
        return $this->comments()->where('approved', 1)->whereNull('parent_id')->get();
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }


}
