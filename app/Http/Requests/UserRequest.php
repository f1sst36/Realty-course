<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'phone' => 'min:5|max:15',
            'name' => 'min:3|max:50',
            'password' => 'min:3|max:50',
            're_password' => 'min:3|max:50',
        ];
    }

    public function messages() {
        return [
            'phone.min' => 'Номер телефона должен быть больше 5 символов',
            'phone.max' => 'Номер телефона должен быть меньше 15 символов',
            'name.min' => 'Имя должено быть больше 3 символов',
            'name.max' => 'Имя должено быть меньше 50 символов',
            'password.min' => 'Пароль должен быть больше 3 символов',
            'password.max' => 'Пароль должен быть меньше 50 символов',
            're_password.min' => 'Повторный пароль должен быть больше 3 символов',
            're_password.max' => 'Повторный пароль должен быть меньше 50 символов',
        ];
     }
}
