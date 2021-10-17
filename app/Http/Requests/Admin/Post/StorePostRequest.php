<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'title' => ['required'],
            'post_type_id' => ['required'],
            'text' => ['required'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg'],
            'categories' => ['nullable'],
            'tags' => ['nullable']
        ];
    }
}
