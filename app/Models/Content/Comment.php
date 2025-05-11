<?php

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use SoftDeletes;
    protected $fillable = ['body', 'parent_id', 'author_id', 'commentable_id', 'commentable_type', 'approved', 'status'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'author_id');
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }


    public function parent()
    {
        return $this->belongsTo($this, 'parent_id');
    }

    public function answers()
    {
        return $this->hasMany($this, 'parent_id');
    }
}
