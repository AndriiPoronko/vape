<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'image' => 'nullable|string',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'is_avialable' => 'nullable|integer',
            'raiting' => 'nullable|integer',
            'colors' => 'nullable|array',
            'category_id' => 'required|integer',
            'quantity' => 'nullable|integer',
            'description' => 'nullable|string',
            'size' => 'nullable|string',
            'cartridge' => 'nullable|string',
            'battery' => 'nullable|string',
            'set' => 'nullable|string',
            'trend' => 'nullable|integer',
            'code' => 'nullable|integer',

        ];
    }
}
