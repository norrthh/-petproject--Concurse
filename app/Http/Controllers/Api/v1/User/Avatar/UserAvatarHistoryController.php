<?php

namespace App\Http\Controllers\Api\v1\User\Avatar;

use App\Http\Controllers\Controller;
use App\Models\HistoryChangeAvatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAvatarHistoryController extends Controller
{
    public function history()
    {
        return HistoryChangeAvatar::query()
            ->where([['user_id', Auth::user()->id]])
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();
    }
}
