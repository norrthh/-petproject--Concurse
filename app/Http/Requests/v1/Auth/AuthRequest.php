<?php

namespace App\Http\Requests\v1\Auth;

use App\Services\Auth\AuthServices;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['email', 'required'],
            'password' => ['required', 'string']
        ];
    }

    public function auth()
    {
        app()->setLocale('ru');

        $services = new AuthServices();
        return $services->auth($this->validated());
    }
}
