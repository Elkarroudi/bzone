<?php

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


Route::any('/auth/register/ptm/{userType}', [RegistrationController::class, 'registerUser']);
Route::any('/auth/register/', [RegistrationController::class, 'registerBasicUser']);
