<?php

namespace App\Http\Controllers\Website\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\GenderMaster\GenderMaster;
use App\Models\Master\ReligionMaster\ReligionMaster;
use App\Models\Master\CasteMaster\CasteMaster;
use App\Models\SubMaster\MartialStatusSubMaster\MartialStatusSubMaster;
use App\Models\Master\HeightMaster\HeightMaster;
use App\Models\Master\LanguageMaster\LanguageMaster;
use App\Models\SubMaster\EatingHabitSubMaster\EatingHabitSubMaster;
use App\Models\Master\CountryMaster\CountryMaster;
use App\Models\Master\StateMaster\StateMaster;
use App\Models\Master\CityMaster\CityMaster;
use App\Models\Master\EducationMaster\EducationMaster;
use App\Models\Master\HoroScopeMaster\HoroScopeMaster;
use App\Models\Master\JobMaster\JobMaster;
use App\Models\SubMaster\FamilyStatusSubMaster\FamilyStatusSubMaster;
use App\Models\Master\RasiMaster\RasiMaster;
use App\Models\Master\StarMaster\StarMaster;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Models\SubMaster\ComplexionSubMaster\ComplexionSubMaster;
use App\Models\SubMaster\SalarySubMaster\SalarySubMaster;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PartnerPreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = [
        //     'gender' => GenderMaster::all(),
        //     'religion' => ReligionMaster::all(),
        //     'caste' => CasteMaster::all(),
        //     'martial_status' => MartialStatusSubMaster::all(),
        //     'height' => HeightMaster::all(),
        //     'language' => LanguageMaster::all(),
        //     'habit' => EatingHabitSubMaster::all(),
        //     'country' => CountryMaster::all(),
        //     'state' => StateMaster::all(),
        //     'city' => CityMaster::all(),
        //     'family_status' => FamilyStatusSubMaster::all(),
        //     'rasi' => RasiMaster::all(),
        //     'star' => StarMaster::all(),
        //     'complexion' => ComplexionSubMaster::all(),
        //     'job' => JobMaster::all(),
        //     'education' => EducationMaster::all(),
        //     'horoscope' => HoroScopeMaster::all(),
        //     'salary' => SalarySubMaster::all()
        // ];
        // // $old_data = ['values' => DB::table('user_preference_infos')->where('user_id', $id)->get()];

        // return view('Website.userDashboard.partnerPreferences', $data)->with('user', auth()->user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'gender' => GenderMaster::all(),
            'religion' => ReligionMaster::all(),
            'caste' => CasteMaster::all(),
            'martial_status' => MartialStatusSubMaster::all(),
            'height' => HeightMaster::all(),
            'language' => LanguageMaster::all(),
            'habit' => EatingHabitSubMaster::all(),
            'country' => CountryMaster::all(),
            'state' => StateMaster::all(),
            'city' => CityMaster::all(),
            'family_status' => FamilyStatusSubMaster::all(),
            'rasi' => RasiMaster::all(),
            'star' => StarMaster::all(),
            'complexion' => ComplexionSubMaster::all(),
            'job' => JobMaster::all(),
            'education' => EducationMaster::all(),
            'horoscope' => HoroScopeMaster::all(),
            'salary' => SalarySubMaster::all(),
            'partner' => UserPreferenceInfo::where('user_id', $id)->firstOrFail(),

        ];
        $user = User::find($id)->load('UserBasicInfos');
        $partner = UserPreferenceInfo::find($id);

        $jobId = [];
        collect($user->userBasicInfos->profile_pref_info_status == 1 ? $partner->partner_job : null)->each(function ($user) use (&$jobId) {
            array_push($jobId, $user->id);
        });
        $educationId = [];
        collect($user->userBasicInfos->profile_pref_info_status == 1 ? $partner->partner_education
            : null)->each(function ($user) use (&$educationId) {
            array_push($educationId, $user->id);
        });
        $jobCountry = [];
        collect($user->userBasicInfos->profile_pref_info_status == 1 ? $partner->partner_job_country
            : null)->each(function ($user) use (&$jobCountry) {
            array_push($jobCountry, $user->id);
        });
        $rasiId = [];
        collect($user->userBasicInfos->profile_pref_info_status == 1 ? $partner->partner_rasi
            : null)->each(function ($user) use (&$rasiId) {
            array_push($rasiId, $user->id);
        });
        $complexionId = [];
        collect($user->userBasicInfos->profile_pref_info_status == 1 ? $partner->partner_complexion
            : null)->each(function ($user) use (&$complexionId) {
            array_push($complexionId, $user->id);
        });
        $LanguageId = [];
        collect($user->userBasicInfos->profile_pref_info_status == 1 ? $partner->partner_mother_tongue
            : null)->each(function ($user) use (&$LanguageId) {
            array_push($LanguageId, $user->id);
        });
        $countryId = [];
        collect($user->userBasicInfos->profile_pref_info_status == 1 ? $partner->partner_country
            : null)->each(function ($user) use (&$countryId) {
            array_push($countryId, $user->id);
        });
        $siblings = [];
        collect($user->userBasicInfos->profile_pref_info_status == 1 ? $partner->partner_country
            : null)->each(function ($user) use (&$countryId) {
            array_push($countryId, $user->id);
        });

        // dd($educationId);
        // $old_data = ['values' => DB::table('user_preference_infos')->where('user_id', $id)->get()];
        // dd($data);
        return view('Website.userDashboard.partnerPreferences', compact('data', 'jobId', 'educationId', 'jobCountry', 'rasiId', 'complexionId', 'LanguageId', 'countryId'))->with('user', auth()->user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
