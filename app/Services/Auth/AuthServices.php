<?php

namespace App\Services\Auth;

use App\Exceptions\Auth\AuthException;

class AuthServices
{
    /**
     * @throws AuthException
     */
    public function auth($data)
    {
        if (auth()->attempt($data)) {
            return [
                'token' => auth()->user()->createToken('auth')->plainTextToken,
                'user' => auth()->user()
            ];
        }

        throw new AuthException();
    }
}
