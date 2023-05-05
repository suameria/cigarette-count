<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrandUserController;
use App\Http\Controllers\SmokeController;
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

Route::get('/brands', [BrandController::class, 'index']);

Route::get('/brand-user', [BrandUserController::class, 'index']);

Route::get('/smokes', [SmokeController::class, 'index']);
