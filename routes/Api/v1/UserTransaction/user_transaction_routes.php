<?php

use App\Http\Controllers\Api\v1\Masters\RasiMasterController;
use App\Http\Controllers\Api\v1\UserTransaction\UserTransactionApiController;
use Illuminate\Http\Request;
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

Route::group(['prefix'=>'user-transaction','as'=>'transaction.'],function()
{

        Route::get('all-transaction',[UserTransactionApiController::class,'getUserTransactions'])->name('user-transaction.ssr');

});
