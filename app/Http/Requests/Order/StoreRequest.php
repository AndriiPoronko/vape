<?php

namespace App\Http\Requests\Order;

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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'city' => 'required|string',
            'address' => 'nullable|string',
            'department' => 'nullable|string',
            'phone_number' => 'required|string',
            'payment' => 'required|string',
            'delivery' => 'required|string',
            'products' => 'required|array'
        ];
    }
}
