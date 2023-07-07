<?php

use App\Http\Controllers\Api\v1\Socialite\SocialiteVkontakteController;
use Illuminate\Support\Facades\Route;


//Route::prefix('/api/v1/socialite')->group(function () {
//    Route::prefix('vkontakte')->group(function () {
//        Route::get('auth', [SocialiteVkontakteController::class, 'auth']);
//        Route::get('webhook', [SocialiteVkontakteController::class, 'webhook']);
//    });
//});

Route::get('/{any}', function (){
    return view('welcome');
})->where('any', '.*');
//
