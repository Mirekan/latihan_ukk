<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])
    ->name('api.login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('api.logout');
Route::post('/register', [AuthController::class, 'register'])
    ->name('api.register');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('industry', App\Http\Controllers\Api\IndustriController::class);
});
