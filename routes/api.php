<?php

use App\Http\Controllers\Api\v1\Auth\AuthController;
use App\Http\Controllers\Api\v1\Image\ImageUploadController;
use App\Http\Controllers\Api\v1\Information\HomeInformationController;
use App\Http\Controllers\Api\v1\News\CommentsController;
use App\Http\Controllers\Api\v1\News\NewsController;
use App\Http\Controllers\Api\v1\User\Avatar\UserAvatarHistoryController;
use App\Http\Controllers\Api\v1\User\Password\ChangePasswordController;
use App\Http\Controllers\Api\v1\User\Password\HistoryChangePasswordController;
use App\Http\Controllers\Api\v1\User\Settings\UserSettingsController;
use App\Http\Controllers\Api\v1\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::prefix('news')->group(function (){
        Route::get('/', [NewsController::class, 'index']);
        Route::get('/{id}', [NewsController::class, 'show']);
    });

    Route::prefix('comments')->group(function (){
        Route::get('/{id}', [CommentsController::class, 'show']);
        Route::post('/sendMessage', [CommentsController::class, 'create'])->middleware('auth:sanctum');
    });

    Route::prefix('information')->group(function () {
        Route::get('home', [HomeInformationController::class, 'information']);
    });

    Route::post('login', [AuthController::class, 'auth'])->name('login');

    Route::middleware('auth:sanctum')->group(function (){
        Route::prefix('user')->group(function (){
            Route::get('/', [UserController::class, 'user']);
            Route::get('/checkAuth', [UserController::class, 'checkAuth']);

            Route::prefix('/edit')->group(function (){
                Route::prefix('avatar')->group(function (){
                    Route::post('/upload', [ImageUploadController::class, 'avatar']);
                    Route::post('/delete', [ImageUploadController::class, 'deleteAvatar']);
                    Route::post('/history', [UserAvatarHistoryController::class, 'history']);
                });

                Route::post('/settings', [UserSettingsController::class, 'settings']);

                Route::prefix('password')->group(function (){
                    Route::post('/changePassword', [ChangePasswordController::class, 'change']);
                    Route::post('/historyChangePassword', [HistoryChangePasswordController::class, 'change']);
                });
            });

            Route::prefix('post')->group(function (){
                Route::post('/uploadImage', [ImageUploadController::class, 'news']);
                Route::post('/create', [NewsController::class, 'create']);
            });


        });

    });
});


