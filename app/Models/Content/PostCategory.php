<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use SoftDeletes;
    protected $casts=['image'=>'array'];
    protected $fillable=['name','description','slug','image','status','tags'];


    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
