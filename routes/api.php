<?php

use App\Http\Controllers\brand\CreateBrandController;
use App\Http\Controllers\brand\deletebrandController;
use App\Http\Controllers\brand\GetBrandController;
use App\Http\Controllers\brand\updateBrandController;
use App\Http\Controllers\cart\CartController;
use App\Http\Controllers\cart\CartItemsController;
use App\Http\Controllers\category\CreateCategoryController;
use App\Http\Controllers\category\deleteCategoryController;
use App\Http\Controllers\category\GetCategoryController;
use App\Http\Controllers\category\updateCategoryController;
use App\Http\Controllers\product\CreateProductController;
use App\Http\Controllers\product\DeleteProductController;
use App\Http\Controllers\product\GetProductController;
use App\Http\Controllers\product\InventoryController;
use App\Http\Controllers\product\UpdateProductController;
use App\Http\Controllers\product\VariantController;
use App\Http\Controllers\user\AddressUserController;
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


Route::get('/', function() {
    return "ok";
});

Route::middleware("auth:sanctum")->group(function() {
    Route::prefix('/user')->group(function() {
        Route::get('/', [GetUserController::class, "getUser"]);
        Route::prefix('/address')->group(function() {
            Route::get('/', [AddressUserController::class, "index"]);
            Route::post('/create', [AddressUserController::class, "create"]);
            Route::patch('/update/{id}', [AddressUserController::class, "update"]);
            Route::delete('/delete/{id}', [AddressUserController::class, "delete"]);
        });
        Route::patch('/update', [EditUserController::class, 'update']);
        Route::patch('/password', [EditUserController::class, 'updatePassword']);
        
        Route::middleware("role:admin")->group(function() {
            Route::get('/{id}', [GetUserController::class, "getUserById"]);
        });
    });
});

Route::post('/login', [LoginController::class, 'login']); //->middleware('throttle:10,1');
Route::post('/user/avatar', [EditUserController::class, 'updateAvatar']);
Route::post('/2fa/verify', [VerifyOtpController::class, 'verifyOtp'])->middleware('throttle:10,1');
Route::post('/2fa/resend', [ResendOtpController::class, 'resendOtp'])->middleware('throttle:5,1');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/forgot-password', [ForgorPassword::class, 'forgotPassword']);
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);
Route::middleware("auth:sanctum")->post('/logout', [LogoutController::class, 'logout']);


Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('product')->group(function () {
        Route::get('/', [GetProductController::class, 'index']);
        Route::post('/', [CreateProductController::class, 'create']);
        Route::get('/{id}', [GetProductController::class, 'getById']);
        Route::patch('/{id}', [UpdateProductController::class, 'update']);
        Route::delete('/{id}', [DeleteProductController::class, 'delete']);
        Route::prefix('/variant')->group(function() {
            Route::post('/variant', [VariantController::class, 'create']);
            Route::patch('/variant/{id}', [VariantController::class, 'update']);
            Route::delete('/variant/{id}', [VariantController::class, 'delete']);
        });
        Route::prefix('/inventory')->group(function() {
            Route::get('/{id}', [InventoryController::class, "getById"]);
            Route::post('/create', [InventoryController::class, "create"]);
            Route::patch('/update', [InventoryController::class, "update"]);
            Route::delete('/delete', [InventoryController::class, "delete"]);
        });
    });

    Route::prefix('brand')->group(function () {
        Route::post('/', [CreateBrandController::class, 'create']);
        Route::get('/{id}', [GetBrandController::class, 'getById']);
        Route::patch('/{id}', [UpdateBrandController::class, 'update']);
        Route::delete('/{id}', [DeleteBrandController::class, 'delete']);
    });

    Route::prefix('category')->group(function () {
        Route::post('/', [CreateCategoryController::class, 'create']);
        Route::get('/{id}', [GetCategoryController::class, 'getById']);
        Route::patch('/{id}', [UpdateCategoryController::class, 'update']);
        Route::delete('/{id}', [DeleteCategoryController::class, 'delete']);
    });

    Route::prefix('/cart')->group(function () {
        Route::get('/', [CartController::class, "index"]);
        Route::post('/items', [CartItemsController::class, "createCartItems"]);
        Route::patch('/items/{id}', [CartItemsController::class, "update"]);
        Route::delete('/items/{id}', [CartItemsController::class, "delete"]);

    });
});

Route::get('/brand', [GetBrandController::class, 'index']);
Route::get('/category', [GetCategoryController::class, 'index']);
