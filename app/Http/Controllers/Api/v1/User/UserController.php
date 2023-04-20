<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user()
    {
        return auth()->user();
    }

    public function checkAuth()
    {
        if (Auth::user()) {
            return response()->json(['message' => 'auth'], 200);
        } else {
            return response()->json(['message' => 'noAuth'], 401);
        }
    }
}
