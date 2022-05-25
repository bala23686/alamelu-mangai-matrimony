<?php

use App\Http\Controllers\Admin\AdminDashboard\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\AuthenticationController;
use App\Http\Controllers\Admin\Payments\PayUPayments\PayUPaymentController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(['prefix'=>'admin/payments','as' => 'admin.payments.'], function () {

    //routes section of pay-u money
    Route::get('pay-u-money/{user_id}/checkout',[PayUPaymentController::class,'index'])->name('payu');

    Route::get('pay-u-money/paid-success',[PayUPaymentController::class,'payusuccess'])->name('payu.payusuccess');
    //url for scuccess response
    Route::post('pay-u-money/success',[PayUPaymentController::class,'success'])
    ->name('payu.success')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
     //url for scuccess failed response
    Route::post('pay-u-money/failed',[PayUPaymentController::class,'failed'])
    ->name('payu.failure')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
    //routes end section of pay-u money
});



