<?php

namespace App\Http\Requests\v1\News;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\News\NewsListServices;

class NewsIndexRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'count' => ['integer'],
            'type' => ['integer'],
        ];
    }


}
