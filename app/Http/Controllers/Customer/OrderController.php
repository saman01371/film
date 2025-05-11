<?php

namespace App\Http\Controllers\Customer;

use App\Models\Content\Page;
use App\Models\Market\Brand;
use Illuminate\Http\Request;
use App\Models\Content\Banner;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductCategory;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        // برای ایجاد سفارش، فیلمی که در سبد خرید است نمایش داده می‌شود
        $filmId = $request->query('film'); // گرفتن فیلم خاص
        $film = Product::findOrFail($filmId);
        return view('app.orders.create', compact('film'));
    }

    public function store(Request $request)
    {
        // ذخیره سفارش
        // مثلاً اینجا می‌توانید اطلاعات سفارش را ذخیره کنید
        // و یا بعد از آن پردازش پرداخت را انجام دهید
        return redirect()->route('app.payment.index');
    }



}
