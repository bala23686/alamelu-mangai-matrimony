<?php

use App\Http\Controllers\Admin\UserManagement\UserMasterController;
use App\Http\Controllers\Api\v1\Users\UserBasicInfo\UserBasicInfoController;
use App\Http\Controllers\Api\v1\Users\UserFamily\UserFamilyInfoController;
use App\Http\Controllers\Api\v1\Users\UserNative\UserNativeInfoController;
use App\Http\Controllers\Api\v1\Users\UserPrefference\UserPrefferenceController;
use App\Http\Controllers\Api\v1\Users\UserPrefference\UserProfessinalPrefferenceController;
use App\Http\Controllers\Api\v1\Users\UserPrefference\UserReligiousPrefferenceController;
use App\Http\Controllers\Api\v1\Users\UserProfession\UserProfessionController;
use App\Http\Controllers\Api\v1\Users\UserProfiles\UserMatchsController;
use App\Http\Controllers\Api\v1\Users\UserProfiles\UserProfileController;
use App\Http\Controllers\Api\v1\Users\UserReligion\UserReligionInfoController;
use App\Http\Controllers\Api\v1\Users\UserShortList\UserShotListController;
use App\Http\Controllers\Website\ShortList\ShortListController;
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

Route::group(['prefix' => 'user-profile', 'middleware' => 'auth:sanctum'], function () {

    Route::apiResource('basic-info', UserBasicInfoController::class);
    Route::apiResource('family-info', UserFamilyInfoController::class);
    Route::apiResource('native-info', UserNativeInfoController::class);
    Route::apiResource('religious-info', UserReligionInfoController::class);
    Route::apiResource('professional-info', UserProfessionController::class);
    Route::apiResource('prefference-info-basic', UserPrefferenceController::class);
    Route::apiResource('prefference-info-professional', UserProfessinalPrefferenceController::class);
    Route::apiResource('prefference-info-religious', UserReligiousPrefferenceController::class);

    //profile image upload & delete
    Route::post('profile-photo-upload/image-update', [UserMasterController::class, 'userProfileImageUpload']);
    Route::delete('profile-image-delete/{id}', [UserMasterController::class, 'deleteUserProfileImage']);

    Route::put('profile/profile-family-information/information-update/{id}', [UserMasterController::class, 'updateUserFamilyInformation'])->name('profile.updateUserFamilyInformation');

    //user multiple image upload & delete

    Route::post('user-multiple-image-upload', [UserMasterController::class, 'uploadMultipleImage']);
    Route::get('user-multiple-image-get/{id}', [UserMasterController::class, 'getUserPhotos']);
    Route::delete('user-multiple-image-delete/{id}', [UserMasterController::class, 'deletePhoto']);

    //User Document Upload Section
    //Tenth Certificate
    Route::post('user-tenth-certificate-upload/{id}', [UserMasterController::class, 'uploadTenthCertificate']);
    //Twelfth  Certificate
    Route::post('user-twelfth-certificate-upload/{id}', [UserMasterController::class, 'uploadTwelthCertificate']);
    //college Certificate
    Route::post('user-college-certificate-upload/{id}', [UserMasterController::class, 'uploadCollegeTc']);
    //Medical  Certificate
    Route::post('user-medical-certificate-upload/{id}', [UserMasterController::class, 'uploadMedicalCertificate']);
    //Aadhar Card
    Route::post('user-aadhar-card-certificate-upload/{id}', [UserMasterController::class, 'adharCardUpload']);

    //user short list routes for api
    Route::apiResource('my-short-list', UserShotListController::class);

    //user matches & profiles
    Route::get('profiles-list', UserProfileController::class);
    Route::get('profiles-match-list', UserMatchsController::class);
});
