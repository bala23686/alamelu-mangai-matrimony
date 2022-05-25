<?php

namespace App\Http\Controllers\Website\UserDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\GenderMaster\GenderMaster;
use App\Models\Master\ReligionMaster\ReligionMaster;
use App\Models\Master\CasteMaster\CasteMaster;
use App\Models\Master\CityMaster\CityMaster;
use App\Models\Master\CountryMaster\CountryMaster;
use App\Models\Master\EducationMaster\EducationMaster;
use App\Models\SubMaster\MartialStatusSubMaster\MartialStatusSubMaster;
use App\Models\Master\HeightMaster\HeightMaster;
use App\Models\Master\JobMaster\JobMaster;
use App\Models\Master\LanguageMaster\LanguageMaster;
use App\Models\Master\RasiMaster\RasiMaster;
use App\Models\Master\StarMaster\StarMaster;
use App\Models\Master\StateMaster\StateMaster;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\SubMaster\EatingHabitSubMaster\EatingHabitSubMaster;
use App\Models\SubMaster\FamilyStatusSubMaster\FamilyStatusSubMaster;
use PhpOffice\PhpSpreadsheet\Reader\Xls\RC4;
use App\Models\User;
use App\Models\SubMaster\SalarySubMaster\SalarySubMaster;
use App\Models\Master\HoroScopeMaster\HoroScopeMaster;
use App\Models\SubMaster\ComplexionSubMaster\ComplexionSubMaster;
use App\Models\Master\UserFamilyInfoMaster\UserFamilyInfoMaster;
use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use App\Models\Master\UserProfessionalMaster\UserProfessionalMaster;
use App\Models\Master\UserReligiousInfoMaster\UserReligiousInfoMaster;
use App\Models\Master\UserHoroscopeInfoMaster\UserHoroscopeInfoMaster;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use App\Models\Master\UserPhotoMaster\UserPhotoMaster;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Models\Master\UserShortListInfoMaster\UserShortListInfoMaster;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user_data = [
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
            'education' => EducationMaster::all(),
            'job' => JobMaster::all(),
            'salary' => SalarySubMaster::all(),
            'horoscope' => HoroScopeMaster::all(),
            'complexion' => ComplexionSubMaster::all(),
            'gender' => GenderMaster::all(),
            'user_info' =>  UserBasicInfoMaster::where('user_id', $id)->first(),
            'user_image_with_path' =>  UserBasicInfoMaster::where('user_id', $id)->first()->imageWithPath,
            'user_family_info' => UserFamilyInfoMaster::where('user_id', $id)->first(),
            'user_native_info' => UserNativeInfoMaster::where('user_id', $id)->first(),
            'user_prof_info' => UserProfessionalMaster::where('user_id', $id)->first(),
            'user_religious_info' => UserReligiousInfoMaster::where('user_id', $id)->first(),
            'user_preference_info' => UserPreferenceInfo::where('user_id', $id)->first(),
            'user_Horoscope_info' => UserHoroscopeInfoMaster::where('user_id', $id)->first(),
        ];

        // dump($user_data);
        $user = User::find($id)->load('UserBasicInfos');
        $user_info = UserProfessionalMaster::find($id);
        // dd($user);
        $educationId = [];
        collect($user->userBasicInfos->profile_prof_info_status == 1 ? $user_info->user_education_id : null)->each(function ($user) use (&$educationId) {
            array_push($educationId, $user->id);
        });
        // dd($educationId);
        return view('Website.userDashboard.editProfile.editProfileIndex', compact('user_data', 'educationId'))->with('user', auth()->user());
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
        $view_page_data = [
            'userInfo' => User::with('userBasicInfos')->where('id', $id)->first(),
        ];

        $userInfo =  User::find($id)->load('userBasicInfos');

        if ($userInfo->userBasicInfos->profile_basic_status == 1) {
            $view_page_data['userBasicInfo'] = UserBasicInfoMaster::with([
                'Gender',
                'MartialStatus',
                'MotherTongue',
                'Height',
                'EatingHabit',
                'Complex'
            ])
                ->where('user_id', $id)
                ->first();

            $view_page_data['user_image_with_path'] =  UserBasicInfoMaster::where('user_id', $id)
                ->first()
                ->imageWithPath;
        }

        if ($userInfo->userBasicInfos->profile_religion_status == 1) {
            $view_page_data['userReligiousInfo'] = UserReligiousInfoMaster::with([
                "Religion",
                "Caste",
                "Star",
                "Rasi",
            ])
                ->where('user_id', $id)
                ->first();
        }

        if ($userInfo->userBasicInfos->profile_pro_info_status == 1) {
            $view_page_data['UserProfessionInfo'] = UserProfessionalMaster::find($id)->load(['Job', 'JobCountry', 'JobState', 'JobCity']);
        }

        if ($userInfo->userBasicInfos->profile_location_status == 1) {
            $view_page_data['userPlaceInfo'] = UserNativeInfoMaster::with([
                "userCountry",
                "userState",
                "userCity"
            ])
                ->where('user_id', $id)
                ->first();
        }

        if ($userInfo->userBasicInfos->profile_fam_info_status == 1) {
            $view_page_data['UserFamilyInfo'] = UserFamilyInfoMaster::with(['FamilyStatusSubMaster'])
                ->where('user_id', $id)
                ->first();
        }

        if ($userInfo->userBasicInfos->profile_jakt_info_status   == 1) {
            $view_page_data['UserHoroscopeInfo'] = UserHoroscopeInfoMaster::where('user_id', $id)
                ->first();
        }

        if ($userInfo->userBasicInfos->profile_pref_info_status  == 1) {
            $view_page_data['UserPreferenceInfo'] = UserPreferenceInfo::with([
                "HeightTo",
                "HeightFrom",
                "MartialStatus",
                "Salary",
                "Religion",
                "Caste",
                "Star",
            ])
                ->where('user_id', $id)
                ->first();
        }

        $view_page_data['shortList'] = UserShortListInfoMaster::where(['user_id' => $id, 'shortlisted_by' => auth()->user()->id])->first();

        $view_page_data['user_photos'] = UserPhotoMaster::where('user_id', $id)->get();

        $view_page_data['packageInfo'] = UserPackageInfoMaster::where('user_id', auth()->user()->id)->get();

        // dd($view_page_data);

        return view('Website.userDashboard.viewCurrentProfile', $view_page_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_data = [
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
            'education' => EducationMaster::all(),
            'job' => JobMaster::all(),
            'salary' => SalarySubMaster::all(),
            'horoscope' => HoroScopeMaster::all(),
            'complexion' => ComplexionSubMaster::all(),
            'gender' => GenderMaster::all(),
            'user_info' =>  UserBasicInfoMaster::where('user_id', $id)->first(),
            'user_image_with_path' =>  UserBasicInfoMaster::where('user_id', $id)->first()->imageWithPath,
            'user_family_info' => UserFamilyInfoMaster::where('user_id', $id)->first(),
            'user_native_info' => UserNativeInfoMaster::where('user_id', $id)->first(),
            'user_prof_info' => UserProfessionalMaster::where('user_id', $id)->first(),
            'user_religious_info' => UserReligiousInfoMaster::where('user_id', $id)->first(),
            'user_preference_info' => UserPreferenceInfo::where('user_id', $id)->first(),
            'user_Horoscope_info' => UserHoroscopeInfoMaster::where('user_id', $id)->first(),

        ];

        // dump($user_data);
        $user = User::find($id)->load('UserBasicInfos')->load('userProfessinalInfos');

        // dd($user);
        // dd($user_info);
        $educationId = [];
        collect($user->userBasicInfos->profile_pro_info_status == 1 ? $user->userProfessinalInfos->user_education_id : null)->each(function ($user) use (&$educationId) {
            array_push($educationId, $user->id);
        });
        // dd($educationId);
        return view('Website.userDashboard.editProfile.editProfileIndex', compact('user_data', 'educationId'))->with('user', auth()->user());
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
