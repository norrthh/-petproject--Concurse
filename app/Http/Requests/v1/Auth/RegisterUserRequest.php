<?php

namespace App\Http\Requests\v1\Auth;

use App\Services\Auth\RegisterUserServices;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'email' => ['email', 'required'],
            'password' => ['required', 'string']
        ];
    }

    public function register()
    {
        $services = new RegisterUserServices();
        return $services->register($this->validated()['email'], $this->validated()['email'], $this->validated()['password']);
    }
}
