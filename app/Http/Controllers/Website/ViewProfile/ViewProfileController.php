<?php

namespace App\Http\Controllers\Website\ViewProfile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Website\ShortList\ShortListController;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserFamilyInfoMaster\UserFamilyInfoMaster;
use App\Models\Master\UserHoroscopeInfoMaster\UserHoroscopeInfoMaster;
use App\Models\Master\UserLog\UserLog;
use App\Models\Master\UserLog\UserLogMaster;
use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use App\Models\Master\UserPhotoMaster\UserPhotoMaster;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Models\Master\UserProfessionalMaster\UserProfessionalMaster;
use App\Models\Master\UserReligiousInfoMaster\UserReligiousInfoMaster;
use App\Models\Master\UserShortListInfoMaster\UserShortListInfoMaster;
use App\Models\User;
use Illuminate\Http\Request;

use function React\Promise\Stream\first;

class ViewProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Website.viewProfile');
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
            $view_page_data['UserProfessionInfo'] =UserProfessionalMaster::find($id)->load(['Job','JobCountry','JobState','JobCity']);
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
                // "Complexion",
                // "Language",
                // "Job",
                // "Education",
                "Salary",
                "Religion",
                "Caste",
                "Star",
                // "Rasi",
                // "Country",
                // "State",
                // "City"
            ])
                ->where('user_id', $id)
                ->first();
        }

        $view_page_data['shortList'] = UserShortListInfoMaster::where(['user_id' => $id, 'shortlisted_by' => auth()->user()->id])->first();

        $view_page_data['user_photos'] = UserPhotoMaster::where('user_id', $id)->get();

        $view_page_data['packageInfo'] = UserPackageInfoMaster::where('user_id', auth()->user()->id)->get();

        return view('Website.viewProfile', $view_page_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $packageInfo = UserPackageInfoMaster::where('user_id', auth()->user()->id)->first();

        $remainCount = $packageInfo->user_views_remaining;
        $viewLog = new UserLogMaster();
        $viewLog->user_id = auth()->user()->id;
        $viewLog->viewed_user_id = $id;
        $viewLog->save();
        // $viewLog->updateOrCreate(['user_id' => auth()->user()->id]);

        if ($remainCount > 0) {

            $packageInfo->user_views_remaining = $remainCount - 1;
            $packageInfo->save();
            if ($packageInfo->save()) {
                return response(["message" => "User View Count Updated!", 'status' => 200]);
            }
            return response(["message" => "Something Went Wrong!", 'status' => 500]);
        } else {
            return response(["message" => "Max User Views Count Reached!", 'status' => 500]);
        }
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
