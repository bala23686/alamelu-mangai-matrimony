<?php

use App\Http\Controllers\Admin\UserManagement\UserMasterController;
use App\Http\Controllers\Api\v1\Search\SearchController;
use App\Http\Controllers\Api\v1\Users\UserBasicInfo\UserBasicInfoController;
use App\Http\Controllers\Api\v1\Users\UserFamily\UserFamilyInfoController;
use App\Http\Controllers\Api\v1\Users\UserNative\UserNativeInfoController;
use App\Http\Controllers\Api\v1\Users\UserPrefference\UserPrefferenceController;
use App\Http\Controllers\Api\v1\Users\UserPrefference\UserProfessinalPrefferenceController;
use App\Http\Controllers\Api\v1\Users\UserPrefference\UserReligiousPrefferenceController;
use App\Http\Controllers\Api\v1\Users\UserProfession\UserProfessionController;
use App\Http\Controllers\Api\v1\Users\UserReligion\UserReligionInfoController;
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

Route::group(['prefix' => 'search', 'middleware' => 'auth:sanctum'], function () {

    //profile image upload & delete
    Route::post('search-by-id', [SearchController::class, 'searchById']);
    Route::post('basic-search', [SearchController::class, 'basicSearch']);
    Route::post('advance-search', [SearchController::class, 'advanceSearch']);
});
