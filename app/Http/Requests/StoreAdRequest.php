<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdRequest extends FormRequest
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
            "user_id" => ["required", "integer"],
            "seller" => ["required"],
            "title" => ["required", "min:3"],
            "body" => ["required"],
            "image_path" => ["mimes:jpeg,bmp,png"]
        ];
    }
}
