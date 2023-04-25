<?php

namespace App\Http\Requests\v1\User\Password;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'password' => ['required']
        ];
    }
}
