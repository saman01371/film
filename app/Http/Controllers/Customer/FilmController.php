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

class FilmController extends Controller
{


    public function index()
    {
        // نمایش لیست همه فیلم‌ها
        $films = Product::all();
        return view('app.films.index', compact('films'));
    }

    public function show(Product $film)
    {
        // نمایش جزئیات یک فیلم
        return view('app.films.show', compact('film'));
    }


}
