<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        if($this->isMethod('post')){
            return [
                'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'summary' => 'required|max:1000|min:5',
                'story' => 'required|max:10000|min:5',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
               // 'video' => 'mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4',
               // 'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
               // 'video' => 'required|video|mimes:mp4',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:product_categories,id',
                'published_at' => 'required|numeric',
            ];
        }
        else{
            return [
                'name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'summary' => 'required|max:1000|min:5',
                'story' => 'required|max:10000|min:5',
                'price' => 'required|numeric',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'category_id' => 'required|min:1|max:100000000|regex:/^[0-9]+$/u|exists:product_categories,id',
                'published_at' => 'required|numeric',
            ];
        }

    }
}
