<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Auth\AuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function auth(AuthRequest $request)
    {
        return $request->auth();
    }
}
