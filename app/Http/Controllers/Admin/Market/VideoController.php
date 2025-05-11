<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Services\File\FileService;
use App\Models\Market\Product;
use App\Models\Market\ProductVideo;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Product $product)
    {
        return view('admin.market.product.video.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('admin.market.product.video.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product, FileService $fileService)
    {
        $validated = $request->validate([
            //  'image' => 'required|image|mimes:png,jpg,jpeg,gif',
        ]);
        $inputs = $request->all();
        if ($request->hasFile('video')) {
            $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'video-files');
            $fileService->setFileSize($request->video);
            $fileSize = $fileService->getFileSize();
            $result = $fileService->moveToStorage($request->video);
            $fileFormat = $fileService->getFileFormat();
            $inputs['video'] = $result;
            $inputs['file_size'] = $fileSize;

            if ($result === false) {
                return redirect()->route('admin.market.video.index', $product->id)->with('swal-error', 'آپلود ویدیو با خطا مواجه شد');
            }

            $inputs['product_id'] = $product->id;
            $video = ProductVideo::create($inputs);
            return redirect()->route('admin.market.video.index', $product->id)->with('swal-success', 'ویدیو شما با موفقیت ثبت شد');
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
    public function edit(ProductVideo $video, Product $product)
    {

        return view('admin.market.product.video.edit', compact('video', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductVideo $video, Product $product, FileService $fileService)
    {

        $inputs = $request->all();

        if ($request->hasFile('video')) {

            if (!empty($video->video)) {

                $fileService->deleteFile($video->video);
              //  dd('s');
            }
            $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'video-files');
            $fileService->setFileSize($request->video);
            $fileSize = $fileService->getFileSize();
            $result = $fileService->moveToStorage($request->video);
            $fileFormat = $fileService->getFileFormat();
            $inputs['video'] = $result;
            $inputs['file_size'] = $fileSize;
            if ($result === false) {
                return redirect()->route('admin.market.video.index', $product->id)->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }

        }



        $product->update($inputs);

        return redirect()->route('admin.market.video.index', $product->id)->with('swal-success', 'محصول  شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, ProductVideo $video)
    {
        $result = $video->delete();
        return redirect()->route('admin.market.video.index', $product->id)->with('swal-success', 'عکس شما با موفقیت حذف شد');
    }
}
