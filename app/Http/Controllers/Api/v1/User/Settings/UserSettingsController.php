<?php

namespace App\Http\Controllers\Api\v1\User\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\User\Settings\UserSettingsRequest;
use App\Services\User\Settings\UserSettingsServices;
use Illuminate\Http\Request;

class UserSettingsController extends Controller
{
    public function settings(UserSettingsRequest $request, UserSettingsServices $services)
    {
        return $services->services($request->all());
    }
}
