<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Auth;

class ImageFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|array|between:1,2',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date_format:d/m/Y',
        ];
    }
}
