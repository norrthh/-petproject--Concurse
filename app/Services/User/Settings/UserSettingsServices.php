<?php

namespace App\Services\User\Settings;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserSettingsServices
{

    /*
     *  vk_social -
     *  tg_social -
     *  name -
     *  email -
     * */
    public function services($data)
    {

        $data = array_filter($data);

        User::query()->where([['id', Auth::user()->id]])->update($data);

        return response()->json(
            User::query()->where([['id', Auth::user()->id]])->first()
            , 200);
    }
}
