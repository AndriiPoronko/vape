<?php

namespace App\Http\Requests\User;

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
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'email' => 'required|string|email|unique:users,email,' . $this->user_id,
            'patronymic' => 'nullable|string',
            'address' => 'nullable|string',
            'age' => 'nullable|integer',
            'phone_number' => 'required|integer',
            'gender' => 'nullable|integer',
            'role' => 'nullable|string',
            'user_id' => 'required|integer|exists:users,id'
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'Поле должно быть заполненым',
            'email.required' => 'Поле должно быть заполненым',
            'email.email' => 'ВВедите email корректно',
            'email.unique' => 'Пользователь с таким email уже существует',
            'age.required' => 'Поле должно быть заполненым',
            'phone_number.required' => 'Поле должно быть заполненым',
            'last_name.required' => 'Поле должно быть заполненым',
        ];
    }
}
