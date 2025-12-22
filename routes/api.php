<?php

use App\Http\Controllers\user\ForgorPassword;
use App\Http\Controllers\user\GetUserController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\LogoutController;
use App\Http\Controllers\user\RegisterController;
use App\Http\Controllers\user\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware("auth:sanctum")->get('/user', [GetUserController::class, "getUser"]);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/forgot-password', [ForgorPassword::class, 'forgotPassword']);
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);
Route::middleware("auth:sanctum")->post('/logout', [LogoutController::class, 'logout']);