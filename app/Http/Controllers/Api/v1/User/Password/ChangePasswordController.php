<?php

namespace App\Http\Controllers\Api\v1\User\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\User\Password\ChangePasswordRequest;
use App\Services\User\Password\ChangePasswordServices;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function change(ChangePasswordRequest $request, ChangePasswordServices $services)
    {
        return $services->change($request->all());
    }
}
