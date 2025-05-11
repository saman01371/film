<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;

class OnlinePayment extends Model
{
    protected $guarded = ['id'];
    public function payments()
    {
        return $this->morphMany('App\Models\Market\Payment', 'paymentable');
    }
}
