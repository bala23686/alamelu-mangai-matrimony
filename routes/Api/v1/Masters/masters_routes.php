
<?php

use App\Http\Controllers\Admin\Masters\CityMaster\CityMasterController;
use App\Http\Controllers\Admin\Masters\NakshathiraMaster\NakshathiraMasterController;
use App\Http\Controllers\Admin\Masters\StateMaster\StateMasterController;
use App\Http\Controllers\Api\v1\SubMasters\SubMastersGetController;
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

//routes related to submasters
  Route::group(['prefix'=>'masters'],function()
  {
        Route::get('gender',[SubMastersGetController::class,'getGender']);
        Route::get('caste',[SubMastersGetController::class,'getCaste']);
        Route::get('religion',[SubMastersGetController::class,'getReligion']);
        Route::get('religion/{id}/caste',[SubMastersGetController::class,'getCasteByReligion']);
        Route::get('location',[SubMastersGetController::class,'getLocation']);
        Route::get('height',[SubMastersGetController::class,'getHeight']);
        Route::get('package',[SubMastersGetController::class,'getPackage']);
        Route::get('m-status',[SubMastersGetController::class,'getMartialStatus']);
        Route::get('language',[SubMastersGetController::class,'getLanguage']);
        Route::get('eating-habit',[SubMastersGetController::class,'getEatingHabit']);
        Route::get('complexion',[SubMastersGetController::class,'getComplexion']);
        Route::get('family-status',[SubMastersGetController::class,'getFamilyStatus']);
        Route::get('education-list',[SubMastersGetController::class,'getEducation']);
        Route::get('country-list',[SubMastersGetController::class,'getCountry']);
        Route::get('job-list',[SubMastersGetController::class,'getJob']);
        Route::get('salary-list',[SubMastersGetController::class,'getSalary']);
        Route::get('state-list',[SubMastersGetController::class,'getState']);
        Route::get('state/state-by-country/{id}',[StateMasterController::class,'statebycountry']);
        Route::get('city-list',[SubMastersGetController::class,'getCity']);
        Route::get('city/city-by-state/{id}',[CityMasterController::class,'citybystate']);
        Route::get('horoscope-list',[SubMastersGetController::class,'getHoroScope']);
        Route::get('star-list',[SubMastersGetController::class,'getStar']);
        Route::get('rasi-list',[SubMastersGetController::class,'getRasi']);
        Route::get('star/star-by-rasi/{id}',[NakshathiraMasterController::class,'nakshathiraByRasi']);
        Route::get('age-list',[SubMastersGetController::class,'getAge']);

  });
