<?php

use App\Http\Controllers\Api\v1\Authentication\AuthenticationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'users'], function () {

    Route::post('register-user', [AuthenticationController::class, 'registerUser']);
    Route::post('user-login', [AuthenticationController::class, 'userLogin']);
});

Route::group(['prefix' => 'users', 'middleware' => 'auth:sanctum'], function () {

    Route::post('logout-user', [AuthenticationController::class, 'logoutUser']);
});
