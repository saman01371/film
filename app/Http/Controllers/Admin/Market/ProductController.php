<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductRequest;
use App\Http\Services\File\FileService;
use App\Http\Services\Image\ImageService;
use App\Models\Market\Brand;
use App\Models\Market\Language;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use App\Models\Market\ProductMeta;
use App\Models\Market\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->can('index-product')) {
            $products = Product::orderBy('created_at', 'desc')->simplePaginate(15);
            return view('admin.market.product.index', compact('products'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        if ($user->can('create-product')) {
            $years = Year::all();
            $languages = Language::all();
            $productCategories = ProductCategory::all();
            return view('admin.market.product.create', compact('years', 'productCategories', 'languages'));
        } else {
            abort(403);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, ImageService $imageService, FileService $fileService)
    {

        // dd($request->hasFile('video'));
        $user = auth()->user();
        if ($user->can('create-product')) {

            $inputs = $request->all();

            //date fixed
            $realTimestampStart = substr($request->published_at, 0, 10);
            $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
            $inputs['slug'] = str_replace(' ', '-', $inputs['name']);
            // dd($inputs['summary']);

            if ($request->hasFile('image')) {
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
                $result = $imageService->save($request->file('image'));
                if ($result === false) {
                    return redirect()->route('admin.market.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
                }
                $inputs['image'] = $result;
            }
            if ($request->hasFile('video')) {
                $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'video-files');
                $fileService->setFileSize($request->video);
                $fileSize = $fileService->getFileSize();
                $result = $fileService->moveToPublic($request->video);
                $fileFormat = $fileService->getFileFormat();
                $inputs['video'] = $result;
            }
            if ($request->hasFile('video_path')) {
                $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'video-files-main');
                $fileService->setFileSize($request->video_path);
                $fileSize = $fileService->getFileSize();
                $result = $fileService->moveToStorage($request->video_path);
                $fileFormat = $fileService->getFileFormat();
                $inputs['video_path'] = $result;
            }
            // dd($inputs);
            $product = Product::create($inputs);
            return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول  جدید شما با موفقیت ثبت شد');

        } else {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $user = auth()->user();
        //dd($user->hasRole('admin'));
        if ($user->can('edit-product') || ($user->hasRole('admin'))) {
            $years = Year::all();
            $languages = Language::all();
            $productCategories = ProductCategory::all();
            return view('admin.market.product.edit', compact('product', 'productCategories', 'years', 'languages'));
        } else {
            abort(403);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product, ImageService $imageService, FileService $fileService)
    {
        $user = auth()->user();
        if ($user->can('edit-product') || ($user->hasRole('admin'))) {
            $inputs = $request->all();
            //date fixed
            $realTimestampStart = substr($request->published_at, 0, 10);
            $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
            if ($request->hasFile('image')) {
                if (!empty($product->image)) {
                    $imageService->deleteImage($product->image);
                }
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');

                $result = $imageService->save($request->file('image'));
                if ($result === false) {
                    return redirect()->route('admin.market.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
                }
                $inputs['image'] = $result;
            }
            if ($request->hasFile('video')) {
                if (!empty($product->video)) {
                    $fileService->deleteFile($product->video);
                }
                $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'video-files');
                $fileService->setFileSize($request->video);
                $fileSize = $fileService->getFileSize();
                $resultVideo = $fileService->moveToPublic($request->video);
                $fileFormat = $fileService->getFileFormat();
                $inputs['video'] = $result;
            }
            if ($request->hasFile('video_path')) {
                if (!empty($product->video_path)) {
                    $fileService->deleteFile($product->video_path);
                }
                $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'video-files-main');
                $fileService->setFileSize($request->video_path);
                $fileSize = $fileService->getFileSize();
                $resultPath = $fileService->moveToStorage($request->video_path);
                $fileFormat = $fileService->getFileFormat();
                $inputs['video_path'] = $result;
            }

            if ($result === false) {
                return redirect()->route('admin.market.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
            $inputs['video'] = $resultVideo;
            $inputs['video_path'] = $resultPath;
            $product->update($inputs);

            return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول  شما با موفقیت ویرایش شد');
        } else {
            abort(403);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $user = auth()->user();
        if ($user->can('delete-product') || ($user->hasRole('admin'))) {
            $result = $product->delete();
            return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول شما با موفقیت حذف شد');
        } else {
            abort(403);
        }
    }
}
