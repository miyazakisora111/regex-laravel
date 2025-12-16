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
    return redirect()->route('user.login');
});

// 認証不要
// NOTE: ミドルウェアでの遷移を考慮して、ミドルウェアの外に置く。
Route::get('/user/login', [WebLoginUserController::class, 'index'])
    ->name('user.login');
Route::post('/user/login', [WebLoginUserController::class, '__invoke'])
    ->name('login.submit');

// Web 用ルート
Route::middleware('web')->group(function () {

    // 認証済みユーザー向け
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/user', WebCreateUserController::class);
        Route::get('/user/{userId}', WebLoadUserController::class);
    });
});
