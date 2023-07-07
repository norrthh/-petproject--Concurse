<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Auth\RegisterUserRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        return $request->register();
    }
}
