<?php

namespace App\Models\Notify;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SMS extends Model
{
    protected $table = 'public_sms';

    use SoftDeletes;


    protected $fillable = ['title', 'body', 'status', 'published_at'];

}
