<?php

use App\Http\Controllers\Api\v1\Auth\AuthController;
use App\Http\Controllers\Api\v1\Image\ImageUploadController;
use App\Http\Controllers\Api\v1\Information\HomeInformationController;
use App\Http\Controllers\Api\v1\News\CommentsController;
use App\Http\Controllers\Api\v1\News\NewsController;
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
                });

                Route::post('/settings', [UserSettingsController::class, 'settings']);
            });

            Route::prefix('post')->group(function (){
                Route::post('uploadImage', [ImageUploadController::class, 'news']);
                Route::post('create', [NewsController::class, 'create']);
            });
        });

    });
});


