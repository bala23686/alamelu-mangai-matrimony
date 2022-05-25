<?php

use App\Http\Controllers\Admin\Payments\UserPaymentController;
use App\Http\Controllers\Admin\UserManagement\UserMasterController;
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



Route::group(['prefix'=>'profile-managament','as'=>'admin.','middleware'=>'is_admin'],function () {



       Route::get('profile/profile-transaction-list/{id}',[UserMasterController::class,'profileTransactionList'])->name('profile.profileTransactionList');



});







