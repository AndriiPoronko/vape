<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'image' => 'nullable|file',
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
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно к заполнению',
            'price.required' => 'Цена не указана',
            'price.integer' => 'Цена ложна быть в формате 14.99',
            'category_id.required' => 'Категория должна быть выбрана',
            'title.string' => 'Данные должны быть заполнены корректно',
            'image.file' => 'Необходимо выбрать файл',
            'code.integer' => 'Артикул должен быть числом',
            'quantity.integer' => 'Количество должен быть числом',
        ];
    }
}
