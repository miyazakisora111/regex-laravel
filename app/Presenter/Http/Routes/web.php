<?php

declare(strict_types=1);

use App\Presenter\Http\Controllers\Web\{
    WebLoginController,
    WebHomeController
};
use App\Presenter\Http\Controllers\Web\User\{
    WebCreateUserController,
    WebLoadUserController,
};
use Illuminate\Support\Facades\Route;

// トップページアクセス
Route::get('/', function () {
    return redirect()->route('login');
});

// 認証不要
// NOTE: ミドルウェアでの遷移を考慮して、ミドルウェアの外に置く。
Route::get('/login', [WebLoginController::class, 'index'])
    ->name('login');
Route::post('/login', [WebLoginController::class, '__invoke'])
    ->name('login.submit');

// Web 用ルート
Route::middleware('web')->group(function () {

    Route::get('/home', [WebHomeController::class, 'index'])
        ->name('home');

    // 認証済みユーザー向け
    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/user', WebCreateUserController::class);
        Route::get('/user/{userId}', WebLoadUserController::class);
    });
});
