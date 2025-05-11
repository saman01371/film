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

class HomeController extends Controller
{


    public function index()
    {
        $films = Product::latest()->take(8)->get();
        $categories = ProductCategory::all();
        return view('app.home', compact('films', 'categories'));
    }


}
