<?php

use App\Http\Controllers\brand\GetBrandController;
use App\Http\Controllers\category\GetCategoryController;
use App\Http\Controllers\product\CreateProductController;
use App\Http\Controllers\product\GetProductController;
use App\Http\Controllers\user\EditUserController;
use App\Http\Controllers\user\ForgorPassword;
use App\Http\Controllers\user\GetUserController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\LogoutController;
use App\Http\Controllers\user\RegisterController;
use App\Http\Controllers\user\ResendOtpController;
use App\Http\Controllers\user\ResetPasswordController;
use App\Http\Controllers\user\VerifyOtpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware("auth:sanctum")->get('/user', [GetUserController::class, "getUser"]);
Route::post('/login', [LoginController::class, 'login']); //->middleware('throttle:10,1');
Route::middleware("auth:sanctum")->patch('/user/update', [EditUserController::class, 'update']);
Route::middleware("auth:sanctum")->post('/user/avatar', [EditUserController::class, 'updateAvatar']);
Route::middleware("auth:sanctum")->patch('/user/password', [EditUserController::class, 'updatePassword']);
Route::post('/2fa/verify', [VerifyOtpController::class, 'verifyOtp'])->middleware('throttle:10,1');
Route::post('/2fa/resend', [ResendOtpController::class, 'resendOtp'])->middleware('throttle:5,1');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/forgot-password', [ForgorPassword::class, 'forgotPassword']);
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);
Route::middleware("auth:sanctum")->post('/logout', [LogoutController::class, 'logout']);

//brand
Route::get('/brand', [GetBrandController::class, 'index']);
Route::get('/category', [GetCategoryController::class, 'index']);
Route::middleware("auth:sanctum")->post('/product', [CreateProductController::class, 'create']);
Route::middleware("auth:sanctum")->get('/product', [GetProductController::class, 'index']);
