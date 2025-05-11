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

class CategoryController extends Controller
{
    public function show(ProductCategory $category)
    {
        // نمایش فیلم‌ها در یک دسته‌بندی خاص
        $films = $category->films;
        return view('app.categories.show', compact('category', 'films'));
    }


}
