<?php

namespace App\Http\Requests\v1\Image;

use Illuminate\Foundation\Http\FormRequest;

class ImageUploadRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'file' => ['image', 'required', 'mimes:jpg,png,jpeg,gif,svg']
        ];
    }

    public function messages()
    {
        return [
            'file.image' => 'Файл не является картинкой',
            'file.required' => 'Вы не заполнили поле с файлом',
            'file.mimes' => 'Можно загрузить только с форматом jpg,png,jpeg,gif,svg'
        ];
    }
}
