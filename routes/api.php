<?php

use App\Http\Controllers\Api\AuthenticatedController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\BrandUserController;
use App\Http\Controllers\Api\SmokeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api.key.check')->group(function () {
    Route::post('/login', [AuthenticatedController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/brands', [BrandController::class, 'index']);

    // 自分が吸っている銘柄
    Route::prefix('brand-user')->group(function () {
        // 一覧
        Route::get('/', [BrandUserController::class, 'index']);
        // 保存
        Route::post('/', [BrandUserController::class, 'store']);
        // 削除
        Route::delete('/{brand_id}', [BrandUserController::class, 'destroy']);
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
