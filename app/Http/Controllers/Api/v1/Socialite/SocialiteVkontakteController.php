<?php

namespace App\Http\Controllers\Api\v1\Socialite;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Auth\AuthServices;
use App\Services\Auth\RegisterUserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use PHPUnit\Exception;

class SocialiteVkontakteController extends Controller
{
    public function auth()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function webhook(RegisterUserServices $registerUserServices, AuthServices $services)
    {
        $user = Socialite::driver('vkontakte')->user();
        try {
            $findUser = User::query()->where([['auth_vk_id', $user->getId()]])->first();

//            return $user->getId();

            if ($findUser) {
                Auth::login($user);

                return redirect('/');

            } else {
                $registerUserServices->register($user->getName(), $user->getEmail(), 'JASJDSJASJDAJSDJASDJASDJASD', $user->getAvatar(), $user->getId());
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect('/');
        }
    }
}
