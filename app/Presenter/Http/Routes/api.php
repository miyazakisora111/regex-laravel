<?php

declare(strict_types=1);

use App\Presenter\Http\Controllers\Api\{
    User\ApiCreateUserController,
    User\ApiLoadUserController,
    User\ApiLoginUserController
};
use Illuminate\Support\Facades\Route;

// API 用ルート
Route::prefix('api')->group(function () {

    // 認証済みユーザー向け
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/user', ApiCreateUserController::class);
        Route::get('/user/{userId}', ApiLoadUserController::class);
    });

    // 認証不要
    Route::post('/user/login', ApiLoginUserController::class);
});
