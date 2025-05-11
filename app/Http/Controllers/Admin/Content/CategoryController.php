<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Middleware\RoleMiddlware;
use App\Http\Requests\Admin\Content\PostCategoryRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Content\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CategoryController extends Controller
{

    private $user;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function __construct()
    {
        $this->user = auth()->user();
        //  $this->middleware('can:index-categoryContent')->only(['index']);
    }


    public function index()
    {
   //     dd($this->user->can('index-categoryContent'));

        /* return [
             new Middleware(RoleMiddlware::class . ':admin'),
         ];*/

        //  dd($user->hasRol('operator'));
        //    dd($user->can('create-category'));
        // $user = auth()->user();
        // dd($user->roles);
        if ($this->user->can('index-categoryContent')) {

            $postCategories = PostCategory::orderBy('created_at', 'desc')->simplePaginate(10);
            return view('admin.content.category.index', compact('postCategories'));
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
        if ($this->user->can('create-categoryContent')) {
            return view('admin.content.category.create');
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
    public function store(PostCategoryRequest $request, ImageService $imageService)
    {
        if ($this->user->can('create-categoryContent')) {
            $inputs = $request->all();
            $inputs['slug'] = str_replace(' ', '-', $inputs['name']) . '-' . Str::random(5);
            //dd($inputs['slug']);
            if ($request->hasFile('image')) {
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');
                $result = $imageService->createIndexAndSave($request->file('image'));
            }
            if ($result === false) {
                return redirect()->route('admin.content.category.index')
                    ->with('swal-error', 'آپلود عکس با خطا مواجه شد');
            }
            $inputs['image'] = $result;
            $postCategory = PostCategory::create($inputs);
            return redirect()->route('admin.content.category.index')
                ->with('swal-success', 'دسته بندی جدید با موفقیت ثبت شد')->with('toast-success', 'دسته بندی جدید با موفقیت ثبت شد')
                ->with('alert-section-success', 'دسته بندی جدید با موفقیت ثبت شد');
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
    public function show(PostCategory $postCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $postCategory)
    {
        if ($this->user->can('edit-categoryContent') || ($this->user->hasRole('admin'))) {


            return view('admin.content.category.edit', compact('postCategory'));
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
    public function update(PostCategoryRequest $request, PostCategory $postCategory, ImageService $imageService)
    {

        if ($this->user->can('edit-categoryContent') || ($this->user->hasRole('admin'))) {

            $inputs = $request->all();

            if ($request->hasFile('image')) {
                if (!empty($postCategory->image)) {
                    $imageService->deleteDirectoryAndFiles($postCategory->image['directory']);
                }
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post-category');
                $result = $imageService->createIndexAndSave($request->file('image'));
                if ($result === false) {
                    return redirect()->route('admin.content.category.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
                }
                $inputs['image'] = $result;
            } else {
                if (isset($inputs['currentImage']) && !empty($postCategory->image)) {
                    $image = $postCategory->image;
                    $image['currentImage'] = $inputs['currentImage'];
                    $inputs['image'] = $image;
                }
            }
            $postCategory->update($inputs);
            return redirect()->route('admin.content.category.index')->with('swal-success', 'دسته بندی شما با موفقیت ویرایش شد');
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
    public function destroy(PostCategory $postCategory)
    {
        if ($this->user->can('delete-categoryContent') || ($this->user->hasRole('admin'))) {
            $result = $postCategory->delete();
            return redirect()->route('admin.content.category.index')->with('swal-success', 'دسته بندی شما با موفقیت حذف شد');
        } else {
            abort(403);
        }

    }

    public function status(PostCategory $postCategory)
    {

        if ($this->user->can('status-categoryContent') || ($this->user->hasRole('admin'))) {


            $postCategory->status = $postCategory->status == 0 ? 1 : 0;
            $result = $postCategory->save();
            if ($result) {
                if ($postCategory->status == 0) {
                    return response()->json(['status' => true, 'checked' => false]);
                } else {
                    return response()->json(['status' => true, 'checked' => true]);
                }
            } else {
                return response()->json(['status' => false]);
            }
            return redirect()->route('admin.content.category.index');
        } else {
            abort(403);
        }
    }


}
