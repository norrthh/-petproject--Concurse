<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        return User::query()->where([['id', Auth::user()->id]])->first();
    }
}
