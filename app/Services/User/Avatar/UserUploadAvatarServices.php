<?php

namespace App\Services\User\Avatar;
use App\Models\HistoryChangeAvatar;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserUploadAvatarServices
{
    public function uploadAvatar($file): JsonResponse
    {

        User::query()->where([['id', auth()->user()->id]])->update([
            'avatar' => '/'.$file
        ]);

        HistoryChangeAvatar::query()->create([
            'user_id' => Auth::user()->id,
            'avatar' => '/'. $file,
            'IP' => request()->ip()
        ]);

        return response()->json([
            'message' => 'Вы успешно загрузили аватар',
            'urlAvatar' => '/'. $file
        ], 200);
    }
}


//https://media.tenor.com/3S9l9HzhGVcAAAAC/shake-kaninayuta.gif
