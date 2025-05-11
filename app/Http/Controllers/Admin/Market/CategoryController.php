<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = auth()->user();
        if ($user->can('index-categoryProduct')) {
            $productCategories = ProductCategory::orderBy('created_at', 'desc')->simplePaginate(15);
            return view('admin.market.category.index', compact('productCategories'));
        } else {
            abort(403);
        }
    }

    public function creates()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        if ($user->can('create-categoryProduct')) {
            $categories = ProductCategory::where('parent_id', null)->get();
            return view('admin.market.category.create', compact('categories'));
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request, ImageService $imageService)
    {
        $user = auth()->user();
        if ($user->can('create-categoryProduct')) {
            $inputs = $request->all();
            $inputs['slug'] = str_replace(' ', '-', $inputs['name']);
            if ($request->hasFile('image')) {
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
                $result = $imageService->createIndexAndSave($request->file('image'));
            }
            if ($result === false) {
                return redirect()->route('admin.market.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
            $productCategory = ProductCategory::create($inputs);
            return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته بندی جدید شما با موفقیت ثبت شد');

        } else {
            abort(403);
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        $user = auth()->user();
        //dd($user->hasRole('admin'));
        if ($user->can('edit-categoryProduct') || ($user->hasRole('admin'))) {
            $parent_categories = ProductCategory::where('parent_id', null)->get()->except($productCategory->id);
            return view('admin.market.category.edit', compact('productCategory', 'parent_categories'));
        } else {
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory, ImageService $imageService)
    {

        $user = auth()->user();
        //dd($user->hasRole('admin'));
        if ($user->can('edit-categoryProduct') || ($user->hasRole('admin'))) {
            $inputs = $request->all();

            if ($request->hasFile('image')) {
                if (!empty($productCategory->image)) {
                    $imageService->deleteDirectoryAndFiles($productCategory->image['directory']);
                }
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-category');
                $result = $imageService->createIndexAndSave($request->file('image'));
                if ($result === false) {
                    return redirect()->route('admin.market.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
                }
                $inputs['image'] = $result;
            } else {
                if (isset($inputs['currentImage']) && !empty($productCategory->image)) {
                    $image = $productCategory->image;
                    $image['currentImage'] = $inputs['currentImage'];
                    $inputs['image'] = $image;
                }
            }
            $productCategory->update($inputs);
            return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
        } else {
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $user = auth()->user();
        if ($user->can('delete-categoryProduct') || ($user->hasRole('admin'))) {
            $result = $productCategory->delete();
            return redirect()->route('admin.market.category.index')->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');

        } else {
            abort(403);
        }

    }
}
