<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Model;

class CashPayment extends Model
{
    protected $guarded = ['id'];
    public function payments()
    {
        return $this->morphMany('App\Models\Market\Payment', 'paymentable');
    }
}
