<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('admin.market.payment.index', compact('payments'));
    }

    public function store(Request $request)
    {
        $payment = new Payment();
        $payment->order_id = $request->order_id;
        $payment->payment_method = $request->payment_method;
        $payment->transaction_id = $request->transaction_id;
        $payment->status = 'completed'; // یا بر اساس نتیجه درگاه پرداخت
        $payment->save();

        return redirect()->route('orders.index')->with('success', 'پرداخت با موفقیت ثبت شد!');

    }

}
