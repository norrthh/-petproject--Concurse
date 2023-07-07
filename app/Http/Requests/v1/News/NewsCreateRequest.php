<?php

namespace App\Http\Requests\v1\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'namePost' => ['required', 'string'],
            'informationPost' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'namePost.required' => 'Заполните поле с названием поста',
            'informationPost.required' => 'Заполните поля с информацией о посту',
        ];
    }
}
