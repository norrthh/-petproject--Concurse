<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserServices
{
    public function register(string $name, string $email, string $password, string $avatar = 'none', int $vk_id = 0)
    {
        $user = $this->checkedValue($name, $email, $password, $avatar, $vk_id);
        $createUser = $this->createUser($user);

        Auth::login($createUser);

        return response()->json([
            'token' => auth()->user()->createToken('auth')->plainTextToken,
            'user' => auth()->user()
        ], 200);
    }

    protected function checkedValue(string $name, string $email, string $password, string $avatar, int $vk_id)
    {
        $user = [];

        $user = [
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ];

//        return $vk_id;

        if ($vk_id != 0) {
            $user += [
                'social_vk' => $vk_id,
                'auth_vk_id' => $vk_id
            ];
        }

        if ($avatar != 'none') {
            $user += ['avatar' => $avatar];
        }

        return $user;
    }

    protected function createUser(array $user)
    {
        return User::query()->create($user);
    }
}
