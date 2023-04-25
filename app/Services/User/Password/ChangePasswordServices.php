<?php

namespace App\Services\User\Password;

use App\Models\Logs;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordServices
{
    public function change($data): JsonResponse
    {

        $this->changeUser($data);
        $this->addLog();

        return response()->json([
            'message' => 'Вы успешно сменили пароль'
        ], 200);

    }

    protected function changeUser($data): void
    {
        User::query()
            ->where('id', Auth::user()->id)
            ->update([
                'password' => Hash::make($data['password'])
            ]);
    }

    protected function addLog()
    {
        Logs::query()->create([
            'ip' => request()->ip(),
            'status' => 1,
            'user_id' => Auth::user()->id
        ]);
    }
}
