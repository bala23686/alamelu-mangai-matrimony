<?php

namespace App\Http\Controllers\Api\v1\SubMasters;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\CasteMasterResource;
use App\Http\Resources\Master\City\CityResource;
use App\Http\Resources\Master\Complexion\ComplexionResource;
use App\Http\Resources\Master\Country\CountryResource;
use App\Http\Resources\Master\EatingHabit\EatingHabitResource;
use App\Http\Resources\Master\Education\EducationResource;
use App\Http\Resources\Master\FamilyStatus\FamilyStatusResource;
use App\Http\Resources\Master\Gender\GenderMasterResource;
use App\Http\Resources\Master\GenderGenderMasterResource;
use App\Http\Resources\Master\HeightMasterResource;
use App\Http\Resources\Master\Horoscope\HoroscopeResource;
use App\Http\Resources\Master\Job\JobResource;
use App\Http\Resources\Master\Language\LangaugeMasterResource;
use App\Http\Resources\Master\MartialStatus\MartialStatusResource;
use App\Http\Resources\Master\Rasi\RasiResource;
use App\Http\Resources\Master\ReligionMasterResource;
use App\Http\Resources\Master\Salary\SalaryResource;
use App\Http\Resources\Master\Star\StarResource;
use App\Http\Resources\Master\State\StateResource;
use App\Lut\Model\AgeMaster;
use App\Models\Master\CasteMaster\CasteMaster;
use App\Models\Master\CityMaster\CityMaster;
use App\Models\Master\CountryMaster\CountryMaster;
use App\Models\Master\EducationMaster\EducationMaster;
use App\Models\Master\GenderMaster\GenderMaster;
use App\Models\Master\HeightMaster\HeightMaster;
use App\Models\Master\HoroScopeMaster\HoroScopeMaster;
use App\Models\Master\JobMaster\JobMaster;
use App\Models\Master\LanguageMaster\LanguageMaster;
use App\Models\Master\PackageMaster\PackageMaster;
use App\Models\Master\RasiMaster\RasiMaster;
use App\Models\Master\ReligionMaster\ReligionMaster;
use App\Models\Master\StarMaster\StarMaster;
use App\Models\Master\StateMaster\StateMaster;
use App\Models\SubMaster\ComplexionSubMaster\ComplexionSubMaster;
use App\Models\SubMaster\EatingHabitSubMaster\EatingHabitSubMaster;
use App\Models\SubMaster\FamilyStatusSubMaster\FamilyStatusSubMaster;
use App\Models\SubMaster\MartialStatusSubMaster\MartialStatusSubMaster;
use App\Models\SubMaster\SalarySubMaster\SalarySubMaster;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SubMastersGetController extends Controller
{


    public function getGender(Request $request)
    {

        $data = GenderMaster::where('gender_status', 1)->get();

         if( $request->is('api/*'))
         {
             return GenderMasterResource::collection($data);
         }

        return response(json_encode($data, 200));
    }


    public function getCaste(Request $request)
    {
        $casteList = Cache::rememberForever('casteList', function () {

            return CasteMaster::where('caste_status', 1)->with('Religion')->get();
        });

        if ($request->is('api/*')) {

            return CasteMasterResource::collection($casteList);
          }

        return response(json_encode($casteList, 200));
    }

    public function getLocation()
    {
        $cityList = Cache::rememberForever('cityList', function () {

            return CityMaster::where('city_status', 1)->get();
        });

        return response(json_encode($cityList, 200));
    }


    public function getHeight(Request $request)
    {
         $heightList = HeightMaster::where('height_status',1)->get();

         if ($request->is('api/*')) {

            return HeightMasterResource::collection($heightList);
          }


         return response(json_encode($heightList, 200));
    }


    public function getPackage()
    {
        $packagelist = Cache::rememberForever('packagelist', function () {

            return PackageMaster::where('package_status', 1)->get();
        });

        return response(json_encode($packagelist, 200));
    }


    public function getMartialStatus(Request $request)
    {
        $martialStatusList = Cache::rememberForever('martialStatusList',function()
        {
             return MartialStatusSubMaster::where('martial_status_status',1)->get();
        });

        if($request->is('api/*'))
        {
            return MartialStatusResource::collection($martialStatusList);
        }

        return response(json_encode($martialStatusList, 200));

    }

    public function getLanguage(Request $request)
    {
        $lanuageList = Cache::rememberForever('languageList',function()
        {
             return LanguageMaster::where('language_status',1)->get();
        });

        if($request->is('api/*'))
        {
            return  LangaugeMasterResource::collection($lanuageList);
        }

        return response(json_encode($lanuageList, 200));
    }

    public function getEatingHabit(Request $request)
    {
        $eatingHabitList = Cache::rememberForever('eatingHabitList',function()
        {
             return EatingHabitSubMaster::where('habit_status',1)->get();
        });

        if($request->is('api/*'))
        {
            return EatingHabitResource::collection($eatingHabitList);
        }

        return response(json_encode($eatingHabitList, 200));
    }


    public function getComplexion(Request $request)
    {
        $cmplexionList = Cache::rememberForever('cmplexionList',function()
        {
             return ComplexionSubMaster::where('complexion_status',1)->get();
        });

        if($request->is('api/*'))
        {
            return ComplexionResource::collection($cmplexionList);
        }

        return response(json_encode($cmplexionList, 200));
    }


    public function getReligion(Request $request)
    {
        $religionList = Cache::rememberForever('religionList', function () {

            return ReligionMaster::where('religion_status', 1)->get();
        });

        if ($request->is('api/*')) {

            return ReligionMasterResource::collection($religionList);
          }

        return response(json_encode($religionList, 200));
    }


    public function getCasteByReligion(Request $request,$id)
    {

        $casteListByReligion = CasteMaster::where('caste_religion', $id)->get();

        if ($request->is('api/*')) {

            return CasteMasterResource::collection($casteListByReligion);
          }

        return response(json_encode($casteListByReligion, 200));

    }

    public function getFamilyStatus(Request $request)
    {

        $familyStatusList = Cache::rememberForever('familyStatusList', function () {

            return FamilyStatusSubMaster::where('family_type_status', 1)->get();
        });
        if ($request->is('api/*'))
        {
           return FamilyStatusResource::collection($familyStatusList);
        }

        return response(json_encode($familyStatusList, 200));
    }


    public function getHoroScope(Request $request)
    {
        $horoscopeList = Cache::rememberForever('horoscopeList', function () {

            return HoroScopeMaster::where('horoscope_status', 1)->get();
        });

        if($request->is('api/*'))
        {
            return HoroscopeResource::collection($horoscopeList);
        }

        return response(json_encode($horoscopeList, 200));
    }

    public function getEducation(Request $request)
    {
        $educationList = Cache::rememberForever('educationList', function () {

            return EducationMaster::where('education_status', 1)->get();
        });

        if ($request->is('api/*'))
        {
           return EducationResource::collection($educationList);
        }

        return response(json_encode($educationList, 200));
    }

    public function getCountry(Request $request)
    {
        $countryList = Cache::rememberForever('countryList', function () {

            return CountryMaster::where('country_status', 1)->get();
        });

        if($request->is('api/*'))
        {
            return CountryResource::collection($countryList);
        }


        return response(json_encode($countryList, 200));
    }

    public function getJob(Request $request)
    {
        $jobList = Cache::rememberForever('jobList', function () {

            return JobMaster::where('job_status', 1)->get();
        });

        if ($request->is('api/*'))
        {
           return JobResource::collection($jobList);
        }

        return response(json_encode($jobList, 200));
    }


    public function getSalary(Request $request)
    {
        $salaryList = Cache::rememberForever('salaryList', function () {

            return SalarySubMaster::where('salary_status', 1)->get();
        });

        if($request->is('api/*'))
        {
            return SalaryResource::collection($salaryList);
        }

        return response(json_encode($salaryList, 200));

    }

    public function getState(Request $request)
    {

        $stateList = Cache::rememberForever('stateList', function () {

            return StateMaster::where('state_status', 1)->with('Country')->get();
        });

        if($request->is('api/*'))
        {
            return StateResource::collection($stateList);
        }

        return response(json_encode($stateList, 200));
    }


    public function getCity(Request $request)
    {
        $cityList = Cache::rememberForever('cityList', function () {

            return CityMaster::where('city_status', 1)->with('State')->get();
        });

        if($request->is('api/*'))
        {
            return CityResource::collection($cityList);
        }

        return response(json_encode($cityList, 200));
    }


     public function getStar(Request $request)
     {
        $starList = Cache::rememberForever('starList', function () {

            return StarMaster::where('star_status', 1)->with('Rasi')->get();
        });

        if($request->is('api/*'))
        {
            return StarResource::collection($starList);
        }

        return response(json_encode($starList, 200));
     }


     public function getRasi(Request $request)
     {

        $rasiList = Cache::rememberForever('rasiList', function () {

            return RasiMaster::where('rasi_status', 1)->get();
        });

        if($request->is('api/*'))
        {
           return RasiResource::collection($rasiList);
        }

        return response(json_encode($rasiList, 200));
     }


     public function getAge()
     {

        $ageList=AgeMaster::all();

        return response(json_encode($ageList, 200));

     }
}
