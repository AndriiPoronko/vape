<?php

namespace App\Http\Requests\User;

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
            'password' => 'required|string|confirmed',
            'email' => 'required|string',
            'age' => 'nullable|integer',
            'last_name' => 'required|string',
            'patronymic' => 'nullable|string',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|integer',
            'gender' => 'nullable|integer',
        ];
    }
}
