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

       Route::get('profile/profile-ssr-request',[UserMasterController::class,'users'])->name('profile.ssr');
       Route::put('profile/profile-new-password/{id}/password-update',[UserMasterController::class,'updateUserPassword'])->name('profile.updatePassword');
       Route::put('profile/profile-verification/{id}/status-update',[UserMasterController::class,'updateVerificationStatus'])->name('profile.updateVerificationStatus');
       Route::put('profile/profile-image-delete/{id}/delete-profile-image',[UserMasterController::class,'deleteUserProfileImage'])->name('profile.deleteprofileimage');
       Route::post('profile/profile-photo-upload/image-update',[UserMasterController::class,'userProfileImageUpload'])->name('profile.userProfileImageUpload');
       Route::put('profile/profile-basic-information/information-update/{id}',[UserMasterController::class,'updateUserBasicInformation'])->name('profile.updateUserBasicInformation');
       Route::put('profile/profile-family-information/information-update/{id}',[UserMasterController::class,'updateUserFamilyInformation'])->name('profile.updateUserFamilyInformation');
       Route::put('profile/profile-professional-information/information-update/{id}',[UserMasterController::class,'updateUserProfessionalInformation'])->name('profile.updateUserProfessionalInformation');
       Route::put('profile/profile-native-information/information-update/{id}',[UserMasterController::class,'updateUserNativeInformation'])->name('profile.updateUserNativeInformation');
       Route::put('profile/profile-religious-information/religious-information-update/{id}',[UserMasterController::class,'updateUserReligiousInformation'])->name('profile.updateUserReligiousInformation');
       Route::put('profile/profile-horoscope-information/rasi-katam-update/{id}',[UserMasterController::class,'updateUserHoroscopeRasiKatam'])->name('profile.updateUserHoroscopeRasiKatam');
       Route::put('profile/profile-horoscope-information/navamsam-katam-update/{id}',[UserMasterController::class,'updateUserHoroscopeRasiNavamsam'])->name('profile.updateUserHoroscopeNavamsamKatam');

        //routes section to update prefference of user

       Route::put('profile/prefference-basic-information/{id}',[UserMasterController::class,'updateUserPrefferenceBasicInformation'])->name('profile.updateUserPrefferenceBasicInformation');
       Route::put('profile/prefference-job-information/{id}',[UserMasterController::class,'updateUserPrefferenceJobInformation'])->name('profile.updateUserPrefferenceJobInformation');
       Route::put('profile/prefference-religious-information/{id}',[UserMasterController::class,'updateUserPrefferenceReligiousInformation'])->name('profile.updateUserPrefferenceReligiousInformation');


       //section to handle user transaction of packages
       Route::post('profile/user-package-information/purchase-new-package',UserPaymentController::class)->name('profile.purchaseNewPackage');

       //section to handle user multiple image upload section
       Route::post('profile/user-miltiple-image-upload',[UserMasterController::class,'uploadMultipleImage'])->name('profile.uploadMultipleImage');
       Route::get('profile/user-miltiple-image-get/{id}',[UserMasterController::class,'getUserPhotos'])->name('profile.getUserPhotos.ssr');
       Route::delete('profile/user-miltiple-image-delete/{id}',[UserMasterController::class,'deletePhoto'])->name('profile.deletePhoto.ssr');

       Route::post('profile/profile-horoscope-information/jathakam-image-upload/{id}',[UserMasterController::class,'updateUserHoroscopeImageUpload'])->name('profile.updateUserHoroscopeImageUpload');
       Route::post('profile/new-profile-registeration',[UserMasterController::class,'registerNewUser'])->name('profile.registerNewUser');
       Route::resource('profile',UserMasterController::class);

});







