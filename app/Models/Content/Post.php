<?php

namespace App\Models\Content;


use App\Models\User;
use App\Models\Content\PostCategory;
use App\Models\Content\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;



class Post extends Model
{
    use SoftDeletes;
    protected $casts=['image'=>'array'];
    protected $fillable=['title','slug','summary','body','image','status','commentable','tags','category_id','published_at','author_id'];




    public function postCategory(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class,'category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'author_id');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
