<?php

namespace App\Http\Requests\v1\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreateMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'comments' => ['required', 'string'],
            'post_id' => ['required', 'integer']
        ];
    }

    public function messages(): array
    {
        return [
            'comments.required' => 'Заполните поле с текстом',
            'comments.string' => 'Поле должно быть строкой',
            'post_id.required' => '#error1',
            'post_id.integer' => '#error2',
        ];
    }
}
