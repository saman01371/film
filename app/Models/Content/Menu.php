<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'url', 'parent_id', 'status'];


    public function parent(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id')->with('parent');
    }


    public function children(): HasMany
    {
        return $this->hasMany($this, 'parent_id')->with('children');
    }
}
