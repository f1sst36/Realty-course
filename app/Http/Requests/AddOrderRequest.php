<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddOrderRequest extends FormRequest
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
            'name' => 'min:3|max:200',
            'phone' => 'min:8|max:13',
            'area' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'min:3|max:2000',
        ];
    }

    public function messages() {
        return [
            'name.min' => 'Имя должено быть больше 3 символов',
            'name.max' => 'Имя должено быть меньше 200 символов',
            'phone.min' => 'Телефон должен быть больше 8 символов',
            'phone.max' => 'Телефон должен быть меньше 13 символов',
            'description.min' => 'Описание должено быть больше 3 символов',
            'description.max' => 'Описание должено быть меньше 2000 символов',
            'area.required' => 'Площадь обязательна к заполнению',
            'area.numeric' => 'Площадь должна быть числом',
            'price.required' => 'Цена обязательна к заполнению',
            'price.numeric' => 'Цена должна быть числом',
        ];
     }
}
