<?php

namespace App\Services\User\Avatar;

use App\Models\User;

class UserDeleteAvatarServices
{
    public function deleteAvatar()
    {
        User::query()
            ->where([['id', auth()->user()->id]])
            ->update([
                'avatar' => '/avatars/default.jpg'
            ]);

        return response()->json([
            'message' => 'Вы успешно удалили аватарку',
            'urlAvatar' => '/avatars/default.jpg'
        ], 200);
    }
}
