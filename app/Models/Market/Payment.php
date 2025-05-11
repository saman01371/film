<?php

namespace App\Models\Market;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{


    protected $guarded = ['id'];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
