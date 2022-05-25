<?php

use App\Http\Controllers\Admin\Masters\CasteMaster\CasteMasterController;
use App\Http\Controllers\Admin\Masters\CityMaster\CityMasterController;
use App\Http\Controllers\Admin\Masters\CountryMaster\CountryMasterController;
use App\Http\Controllers\Admin\Masters\EducationMaster\EducationMasterController;
use App\Http\Controllers\Admin\Masters\HoroScopeMaster\HoroScopeMasterController;
use App\Http\Controllers\Admin\Masters\JobMaster\JobMasterController;
use App\Http\Controllers\Admin\Masters\LanguageMaster\LanguageMasterController;
use App\Http\Controllers\Admin\Masters\NakshathiraMaster\NakshathiraMasterController;
use App\Http\Controllers\Admin\Masters\PackageMaster\PackageMasterController;
use App\Http\Controllers\Admin\Masters\RasiMaster\RasiMasterController;
use App\Http\Controllers\Admin\Masters\ReligionMaster\ReligionMasterController;
use App\Http\Controllers\Admin\Masters\StateMaster\StateMasterController;
use App\Http\Controllers\Admin\Masters\StatusMaster\StatusMasterController;
use App\Http\Controllers\Api\v1\SubMasters\SubMastersGetController;
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



Route::group(['prefix'=>'masters','as'=>'admin.','middleware'=>'is_admin'],function () {

  Route::resource('rasi',RasiMasterController::class);
  Route::get('nakshathira/nakshathira-by-rasi/{id}',[NakshathiraMasterController::class,'nakshathiraByRasi'])->name('nakshathiraByRasi.ssr');
  Route::resource('nakshathira',NakshathiraMasterController::class);
  Route::resource('religion',ReligionMasterController::class);
  Route::get('caste/caste-by-religion/{id}',[CasteMasterController::class,'castebyreligion'])->name('casteByReligion.ssr');
  Route::resource('caste',CasteMasterController::class);
  Route::resource('country',CountryMasterController::class);
  Route::get('state/state-by-country/{id}',[StateMasterController::class,'statebycountry'])->name('statebycountry.ssr');
  Route::resource('state',StateMasterController::class);
  Route::get('city/city-by-state/{id}',[CityMasterController::class,'citybystate'])->name('citybystate.ssr');
  Route::resource('city',CityMasterController::class);
  Route::resource('education',EducationMasterController::class);
  Route::resource('language',LanguageMasterController::class);
  Route::resource('job',JobMasterController::class);
  Route::resource('horoscope',HoroScopeMasterController::class);
  Route::resource('package',PackageMasterController::class);
  Route::get('status/status-ssr-request',[StatusMasterController::class,'status'])->name('status.ssr');
  Route::resource('status',StatusMasterController::class);

  //routes related to submasters
  Route::group(['prefix'=>'submaster'],function()
  {
        Route::get('gender',[SubMastersGetController::class,'getGender'])->name('submaster.gender.ssr');
        Route::get('caste',[SubMastersGetController::class,'getCaste'])->name('submaster.caste.ssr');
        Route::get('religion',[SubMastersGetController::class,'getReligion'])->name('submaster.religion.ssr');
        Route::get('location',[SubMastersGetController::class,'getLocation'])->name('submaster.location.ssr');
        Route::get('height',[SubMastersGetController::class,'getHeight'])->name('submaster.height.ssr');
        Route::get('package',[SubMastersGetController::class,'getPackage'])->name('submaster.package.ssr');
        Route::get('m-status',[SubMastersGetController::class,'getMartialStatus'])->name('submaster.m-status.ssr');
        Route::get('language',[SubMastersGetController::class,'getLanguage'])->name('submaster.language.ssr');
        Route::get('eating-habit',[SubMastersGetController::class,'getEatingHabit'])->name('submaster.eatinghabit.ssr');
        Route::get('complexion',[SubMastersGetController::class,'getComplexion'])->name('submaster.complextion.ssr');
        Route::get('family-status',[SubMastersGetController::class,'getFamilyStatus'])->name('submaster.familystatus.ssr');
        Route::get('horoscope-list',[SubMastersGetController::class,'getHoroScope'])->name('submaster.horoscope.ssr');
        Route::get('education-list',[SubMastersGetController::class,'getEducation'])->name('submaster.education.ssr');
        Route::get('country-list',[SubMastersGetController::class,'getCountry'])->name('submaster.country.ssr');
        Route::get('job-list',[SubMastersGetController::class,'getJob'])->name('submaster.job.ssr');
        Route::get('salary-list',[SubMastersGetController::class,'getSalary'])->name('submaster.salary.ssr');
        Route::get('state-list',[SubMastersGetController::class,'getState'])->name('submaster.state.ssr');
        Route::get('city-list',[SubMastersGetController::class,'getCity'])->name('submaster.city.ssr');
        Route::get('star-list',[SubMastersGetController::class,'getStar'])->name('submaster.star.ssr');
        Route::get('rasi-list',[SubMastersGetController::class,'getRasi'])->name('submaster.rasi.ssr');
        Route::get('age-list',[SubMastersGetController::class,'getAge'])->name('submaster.age.ssr');
  });


});







