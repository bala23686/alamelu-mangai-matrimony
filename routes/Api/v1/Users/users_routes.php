<?php

use App\Http\Controllers\Admin\UserManagement\UserMasterController;
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

Route::group(['prefix'=>'user-profile','middleware'=>'auth:sanctum'],function()
{

    Route::apiResource('basic-info',UserBasicInfoController::class);
    Route::apiResource('family-info',UserFamilyInfoController::class);
    Route::apiResource('native-info',UserNativeInfoController::class);
    Route::apiResource('religious-info',UserReligionInfoController::class);
    Route::apiResource('professional-info',UserProfessionController::class);
    Route::apiResource('prefference-info-basic',UserPrefferenceController::class);
    Route::apiResource('prefference-info-professional',UserProfessinalPrefferenceController::class);
    Route::apiResource('prefference-info-religious',UserReligiousPrefferenceController::class);

    //profile image upload & delete
    Route::post('profile-photo-upload/image-update',[UserMasterController::class,'userProfileImageUpload']);
    Route::delete('profile-image-delete/{id}',[UserMasterController::class,'deleteUserProfileImage']);

    Route::put('profile/profile-family-information/information-update/{id}',[UserMasterController::class,'updateUserFamilyInformation'])->name('profile.updateUserFamilyInformation');


});
