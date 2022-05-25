<?php

use App\Http\Controllers\Admin\Auth\AuthenticationController;
use App\Http\Controllers\Admin\ProductSetting\PaymentSetting\PaymentSettingController;
use App\Http\Controllers\Admin\ProductSetting\ProductSettingController;
use Illuminate\Support\Facades\Artisan;
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


//Admin side open routes before login
Route::prefix('admin')->as('admin.')->get('login', [AuthenticationController::class, 'login'])
    ->name('login');
Route::prefix('admin')->as('admin.')->post('login', [AuthenticationController::class, 'adminlogin']);



Route::group(['as' => 'admin.setting.', 'middleware' => 'is_admin', 'prefix' => 'settings'], function () {

    //prouduct settings route
    Route::get('product-setting', [ProductSettingController::class, 'index'])->name('product-setting');
    Route::post('product-setting/package-setting', [ProductSettingController::class, 'updatepackageSetting'])->name('package-setting');
    Route::post('product-setting/company-setting', [ProductSettingController::class, 'updateCompanySetting'])->name('company-setting');
    Route::post('product-setting/policy-setting', [ProductSettingController::class, 'updatePolicySetting'])->name('policy-setting');
    Route::post('product-setting/company-setting/logo-upload', [ProductSettingController::class, 'uploadCompanyLogo'])->name('company-setting-logo');
    Route::post('product-setting/company-setting/watermark-upload', [ProductSettingController::class, 'uploadCompanyWaterMark'])->name('company-setting-watermark');
    Route::post('product-setting/theme-setting/website-color', [ProductSettingController::class, 'updateThemeColor'])->name('company-setting-theme');
    Route::post('product-setting/seo-setting/update-seo', [ProductSettingController::class, 'updateSeoSettings'])->name('company-seo-setting');
    //end of product settings route

    //prouduct payment gateway settings route

    Route::group(['as' => 'payment-gateway.'], function (){

        Route::get('payment-gateways',[PaymentSettingController::class,'index'])->name('index');
        Route::prefix('payment-gateways')->get('show/{id}',[PaymentSettingController::class,'show'])->name('show');
        Route::prefix('payment-gateways')->put('update/{id}',[PaymentSettingController::class,'update'])->name('update');

    });


    //end prouduct payment gateway settings route



    //artisan commands to clear cache
    Route::get('clear-cache', function () {
        Artisan::call('optimize:clear');
        Artisan::call('storage:link');

        return response()->json(['message' => 'All Cache Have Been Removed'], 201);
    })->name('clear-cache');
     //end commands to clear cache
});
