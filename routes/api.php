<?php

use App\Http\Controllers\Api\v1\Auth\AuthController;
use App\Http\Controllers\Api\v1\Image\ImageUploadController;
use App\Http\Controllers\Api\v1\Information\HomeInformationController;
use App\Http\Controllers\Api\v1\News\CommentsController;
use App\Http\Controllers\Api\v1\News\NewsController;
use App\Http\Controllers\Api\v1\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
    Route::prefix('news')->group(function (){
        Route::get('/', [NewsController::class, 'index']);
        Route::get('/{id}', [NewsController::class, 'show']);
        Route::post('/create', [NewsController::class, 'create'])->middleware('auth:sanctum');
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

            Route::post('/uploadAvatar', [ImageUploadController::class, 'avatar']);
            Route::post('/deleteAvatar', [ImageUploadController::class, 'deleteAvatar']);
        });

        Route::post('/uploadImage', [ImageUploadController::class, 'news']);
    });
});


