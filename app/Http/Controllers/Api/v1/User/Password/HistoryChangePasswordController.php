<?php

namespace App\Http\Controllers\Api\v1\User\Password;

use App\Http\Controllers\Controller;
use App\Models\Logs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryChangePasswordController extends Controller
{
    public function change()
    {
        return Logs::query()
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')
            ->get();
    }
}
