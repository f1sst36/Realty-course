<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddArticleRequest extends FormRequest
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
            'title' => 'min:3|max:200',
            'preview' => 'min:8|max:200',
            'text' => 'min:8|max:2000',
        ];
    }

    public function messages() {
        return [
            'title.min' => 'Заголовок должен быть больше 3 символов',
            'title.max' => 'Заголовок должен быть меньше 200 символов',
            'preview.min' => 'Ананс должен быть больше 8 символов',
            'preview.max' => 'Анонс должен быть меньше 200 символов',
            'text.min' => 'Текст должен быть больше 8 символов',
            'text.max' => 'Текст должен быть меньше 2000 символов',
        ];
     }
}
