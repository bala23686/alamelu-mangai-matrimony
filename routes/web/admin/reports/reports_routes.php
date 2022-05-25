<?php

use App\Http\Controllers\Admin\Reports\SalesReportController;
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



Route::group(['prefix'=>'reports','as'=>'admin.reports.','middleware'=>'is_admin'],function () {



    Route::get('sales-reports',SalesReportController::class)->name('sales-reports');



});







