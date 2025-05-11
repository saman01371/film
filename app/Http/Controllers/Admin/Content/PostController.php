<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\PostRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Content\Post;
use App\Models\Content\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
     //   dd($user->id);
        if ($user->can('index-content')) {
            $posts = Post::orderBy('created_at', 'desc')->simplePaginate(10);

            // dd($posts[0]->comments);
            // $posts = Post::find(1);
            return view('admin.content.post.index', compact('posts'));
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
        if ($user->can('create-content')) {
            $postCategories = PostCategory::all();
            return view('admin.content.post.create', compact('postCategories'));
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
    public function store(PostRequest $request, ImageService $imageService)
    {
        $user = auth()->user();
        if ($user->can('create-content')) {
            $inputs = $request->all();

            //date fixed
            $realTimestampStart = substr($request->published_at, 0, 10);
            $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

            if ($request->hasFile('image')) {
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
                $result = $imageService->createIndexAndSave($request->file('image'));
                if ($result === false) {
                    return redirect()->route('admin.content.post.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
                }
                $inputs['image'] = $result;
            }
            $inputs['author_id'] = $user->id;
            $post = Post::create($inputs);
            return redirect()->route('admin.content.post.index')->with('swal-success', 'پست  جدید شما با موفقیت ثبت شد');
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
    public function edit(Post $post)
    {
        $user = auth()->user();
        //dd($user->hasRole('admin'));
        if ($user->hasRole('admin') || ($user->id===$post->author_id)) {
            $postCategories = PostCategory::all();
            return view('admin.content.post.edit', compact('post', 'postCategories'));
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
    public function update(PostRequest $request, Post $post, ImageService $imageService)
    {
        $user = auth()->user();
        if ($user->hasRole('admin') || ($user->id===$post->author_id)) {
            $inputs = $request->all();
            //date fixed
            $realTimestampStart = substr($request->published_at, 0, 10);
            $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

            if ($request->hasFile('image')) {
                if (!empty($post->image)) {
                    $imageService->deleteDirectoryAndFiles($post->image['directory']);
                }
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
                $result = $imageService->createIndexAndSave($request->file('image'));
                if ($result === false) {
                    return redirect()->route('admin.content.post.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
                }
                $inputs['image'] = $result;
            } else {
                if (isset($inputs['currentImage']) && !empty($post->image)) {
                    $image = $post->image;
                    $image['currentImage'] = $inputs['currentImage'];
                    $inputs['image'] = $image;
                }
            }
            $post->update($inputs);
            return redirect()->route('admin.content.post.index')->with('swal-success', 'پست  شما با موفقیت ویرایش شد');;
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
    public function destroy(Post $post)
    {
        $user = auth()->user();
        if ($user->can('delete-content')) {

            $result = $post->delete();
            return redirect()->route('admin.content.post.index')->with('swal-success', 'پست  شما با موفقیت حذف شد');
        } else {
            abort(403);
        }
    }

    public function status(Post $post)
    {
        $user = auth()->user();
        if ($user->can('status-content')) {

            $post->status = $post->status == 0 ? 1 : 0;
            $result = $post->save();
            if ($result) {
                if ($post->status == 0) {
                    return response()->json(['status' => true, 'checked' => false]);
                } else {
                    return response()->json(['status' => true, 'checked' => true]);
                }
            } else {
                return response()->json(['status' => false]);
            }
        } else {
            abort(403);
        }
    }

    public function commentable(Post $post)
    {
        $user = auth()->user();
        if ($user->can('commentable-content')) {
            $post->commentable = $post->commentable == 0 ? 1 : 0;
            $result = $post->save();
            if ($result) {
                if ($post->commentable == 0) {
                    return response()->json(['commentable' => true, 'checked' => false]);
                } else {
                    return response()->json(['commentable' => true, 'checked' => true]);
                }
            } else {
                return response()->json(['commentable' => false]);
            }
        } else {
            abort(403);
        }
    }
}
