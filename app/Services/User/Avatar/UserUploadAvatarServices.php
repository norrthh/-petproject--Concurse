<?php

namespace App\Services\User\Avatar;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserUploadAvatarServices
{
    public function uploadAvatar($file): JsonResponse
    {

        User::query()->where([['id', auth()->user()->id]])->update([
            'avatar' => '/'.$file
        ]);

        return response()->json([
            'message' => 'Вы успешно загрузили аватар',
            'urlAvatar' => '/'. $file
        ], 200);
    }
}


//https://media.tenor.com/3S9l9HzhGVcAAAAC/shake-kaninayuta.gif
