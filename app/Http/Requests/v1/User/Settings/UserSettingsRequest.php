<?php

namespace App\Http\Requests\v1\User\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UserSettingsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['email:rfc,dns', 'unique:users,email']
        ];
    }
}
