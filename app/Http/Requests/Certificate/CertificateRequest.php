<?php

namespace App\Http\Requests\Certificate;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "big_title" => ['required'],
            "secondary_title" => ['required'],
            "title" => ['required'],
            "to" => ['required'],
            "body" => ['required'],
            "left_image" => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            "right_image" => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            "show_name" => ['required'],
        ];
    }
}
