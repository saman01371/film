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

class CartController extends Controller
{
    public function index()
    {
        // دریافت اطلاعات سبد خرید از session
        $cart = session()->get('cart', []);
        $totalPrice = collect($cart)->sum('price');



        return view('app.cart.index', compact('cart', 'totalPrice'));
    }

    public function add(Product $film)
    {
        // اضافه کردن فیلم به سبد خرید
        $cart = session()->get('cart', []);
        $cart[$film->id] = $film;
        session()->put('cart', $cart);

        return back();
    }

    public function remove(Product $film)
    {
        // حذف فیلم از سبد خرید
        $cart = session()->get('cart', []);
        unset($cart[$film->id]);
        session()->put('cart', $cart);

        return back();
    }


}
