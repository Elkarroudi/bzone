<?php

use App\Http\Controllers\Api\v1\Auth\AuthenticationController;
use App\Http\Controllers\Api\v1\Auth\RegistrationController;
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

Route::prefix('v1')->group(function () {

    Route::prefix('auth')->group(function () {
        Route::middleware('notLoggedIn')->group(function () {
            Route::any('/register/', [RegistrationController::class, 'registerBasicUser']);
            Route::any('/login/', [AuthenticationController::class, 'login'])->name('login');
            Route::any('/login/verification/', [AuthenticationController::class, 'otpVerification']);
        });

        Route::middleware('isLoggedIn')->group(function () {
            Route::any('/refresh/', [AuthenticationController::class, 'refresh']);
            Route::any('/logout/', [AuthenticationController::class, 'logout']);
        });
    });

    Route::middleware('access:admin')->group(function () {
        Route::any('/auth/register/ptm/admin', [RegistrationController::class, 'registerAdminUser']);
        Route::any('/auth/register/ptm/manager', [RegistrationController::class, 'registerManagerUser']);
    });
});

