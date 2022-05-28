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
            'password_confirmation' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'age' => 'required|integer',
            'last_name' => 'required|string',
            'patronymic' => 'nullable|string',
            'address' => 'nullable|string',
            'phone_number' => 'required|integer|unique:users',
            'gender' => 'nullable|integer',
            'role' => 'nullable|string'
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'Поле должно быть заполненым',
            'password.required' => 'Поле должно быть заполненым',
            'phone_number.required' => 'Поле должно быть заполненым',
            'email.required' => 'Поле должно быть заполненым',
            'email.email' => 'ВВедите email корректно',
            'email.unique' => 'Пользователь с таким email уже существует',
            'phone_number.unique' => 'Пользователь с таким номером уже существует',
            'age.required' => 'Поле должно быть заполненым',
            'last_name.required' => 'Поле должно быть заполненым',
        ];
    }
}
