<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'author' => 'min:3|max:200',
            'text' => 'min:5|max:2000',
        ];
    }

    public function messages() {
        return [
            'author.min' => 'Имя должено быть больше 3 символов',
            'author.max' => 'Имя должено быть меньше 200 символов',
            'text.min' => 'Описание должено быть больше 5 символов',
            'text.max' => 'Описание должено быть меньше 2000 символов',
        ];
     }
}
