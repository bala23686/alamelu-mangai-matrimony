<?php

namespace App\Http\Controllers\Website\Profile\Basicdetails;

use App\Helpers\File\ImageUploadHelper\ImageUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\Dashboard\ProfilesRequests\BasicDetailsRequest;
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
use App\Models\SubMaster\FamilyStatusSubMaster\FamilyStatusSubMaster;
use App\Models\Master\RasiMaster\RasiMaster;
use App\Models\Master\StarMaster\StarMaster;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\Master\EducationMaster\EducationMaster;
use App\Models\Master\HoroScopeMaster\HoroScopeMaster;
use App\Models\Master\JobMaster\JobMaster;
use App\Models\Master\UserFamilyInfoMaster\UserFamilyInfoMaster;
use App\Models\Master\UserHoroscopeInfoMaster\UserHoroscopeInfoMaster;
use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Models\Master\UserProfessionalMaster\UserProfessionalMaster;
use App\Models\Master\UserReligiousInfoMaster\UserReligiousInfoMaster;
use App\Models\SubMaster\ComplexionSubMaster\ComplexionSubMaster;
use App\Models\SubMaster\SalarySubMaster\SalarySubMaster;
use App\Services\Website\DashboardServices\ProfileServices\BasicDetailsUpdateServices;
use Facade\FlareClient\Stacktrace\File;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View as ViewView;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;
use PHPUnit\TextUI\XmlConfiguration\Group;
use PHPUnit\TextUI\XmlConfiguration\Groups;

class BasicDetailController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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


        return view('Website.userDashboard.editProfile.editProfileIndex', $user_data)->with('user', auth()->user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BasicDetailsRequest $request, $id)
    {

        $basic_info_services = new BasicDetailsUpdateServices();
        $basic_info_services->HandleBasicDetails($request, $id);

        return $basic_info_services->HandleBasicDetails($request, $id)
            ? response()->json(['message' => 'Basic Information Updated'], 201)
            : response()->json(['message' => ''], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $id;
    }

    /**
     * Update the specified user image from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userImageUpdate(Request $request, $id)
    {
        $request->validate([
            'profileImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048' // Only allow .jpg, .bmp and .png file types.
        ]);

        try {
            $file = $request->profileImage;
            $imageUploader = new ImageUploadHelper();
            $filename = $imageUploader->storeImageWithWaterMark($file, UserBasicInfoMaster::USER_PROFILE_IMAGE_PATH);
            $user_info =  UserBasicInfoMaster::where('user_id', $id)->first();
            $user_info->user_profile_image = $filename;
            $user_info->save();
            return response(["message" => "User Profile Image Updated!", "file" => $filename]);
        } catch (\Throwable $th) {
            return response($th);
        }
    }

    /**
     * Remove the specified user image from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userImageDelete($id)
    {
        $user_info = UserBasicInfoMaster::where('user_id', $id)->first();
        $image_path = UserBasicInfoMaster::USER_PROFILE_IMAGE_PATH;

        if (file_exists($image_path)) {
            @unlink($image_path);
        }

        $user_info->user_profile_image = '';
        $user_info->save();

        return response()->json(['success' => 'User Profile Image deleted successfully!']);
    }
}
