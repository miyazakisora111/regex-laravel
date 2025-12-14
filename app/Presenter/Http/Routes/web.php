<?php

declare(strict_types=1);

use App\Presenter\Http\Controllers\Web\User\{
    WebCreateUserController,
    WebLoadUserController,
    WebLoginUserController
};
use Illuminate\Support\Facades\Route;

// トップページアクセス
Route::get('/', function () {
    return redirect()->route('login.index');
});

// Web 用ルート
Route::middleware('web')->group(function () {

    // 認証済みユーザー向け
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/user', WebCreateUserController::class);
        Route::get('/user/{userId}', WebLoadUserController::class);
    });

    // 認証不要
    Route::get('/user/login', [WebLoginUserController::class, 'index'])
        ->name('login.index');
    Route::post('/user/login', [WebLoginUserController::class, '__invoke'])
        ->name('login.submit');
});
