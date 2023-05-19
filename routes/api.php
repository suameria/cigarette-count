<?php

use App\Http\Controllers\Api\AuthenticatedController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\BrandUserController;
use App\Http\Controllers\Api\SmokeController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// APIキー制限
Route::middleware('api.key.check')->group(function () {
    // ユーザー登録
    Route::post('/user', [UserController::class, 'store']);
    // ログイン
    Route::post('/login', [AuthenticatedController::class, 'login']);
});

// アクセスキー制限
Route::middleware('auth:sanctum')->group(function () {
    // ユーザーが吸う銘柄
    Route::prefix('brands')->group(function () {
        Route::get('/', [BrandController::class, 'index']);
        Route::post('/', [BrandController::class, 'store']);
        Route::get('/{brand_id}', [BrandController::class, 'show']);
        Route::put('/{brand_id}', [BrandController::class, 'update']);
        Route::delete('/{brand_id}', [BrandController::class, 'delete']);
    });
    // タバコを吸った本数履歴
    Route::prefix('smokes')->group(function () {
        // 本日の喫煙本数履歴
        Route::get('/history', [SmokeController::class, 'history']);
        // 保存
        Route::post('/', [SmokeController::class, 'store']);
        // 更新
        Route::put('/{smoke_id}', [SmokeController::class, 'update']);
    });
});
