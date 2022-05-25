<?php

namespace App\Services\PDF;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserFamilyInfoMaster\UserFamilyInfoMaster;
use App\Models\Master\UserHoroscopeInfoMaster\UserHoroscopeInfoMaster;
use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use App\Models\Master\UserPhotoMaster\UserPhotoMaster;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Models\Master\UserProfessionalMaster\UserProfessionalMaster;
use App\Models\Master\UserReligiousInfoMaster\UserReligiousInfoMaster;
use App\Models\Master\UserShortListInfoMaster\UserShortListInfoMaster;
use App\Models\User;

class generatePdfService
{
    public function generatePdf($id)
    {

        $pdf_data = [
            'userInfo' => User::with('userBasicInfos')->where('id', $id)->first(),
        ];

        $userInfo =  User::find($id)->load('userBasicInfos');

        if ($userInfo->userBasicInfos->profile_basic_status == 1) {
            $pdf_data['userBasicInfo'] = UserBasicInfoMaster::with([
                'Gender',
                'MartialStatus',
                'MotherTongue',
                'Height',
                'EatingHabit',
                'Complex'
            ])
                ->where('user_id', $id)
                ->first();

            $pdf_data['user_image_with_path'] =  UserBasicInfoMaster::where('user_id', $id)
                ->first()
                ->imageWithPath;
        }

        if ($userInfo->userBasicInfos->profile_religion_status == 1) {
            $pdf_data['userReligiousInfo'] = UserReligiousInfoMaster::with([
                "Religion",
                "Caste",
                "Star",
                "Rasi",
            ])
                ->where('user_id', $id)
                ->first();
        }

        if ($userInfo->userBasicInfos->profile_pro_info_status == 1) {
            $pdf_data['UserProfessionInfo'] = UserProfessionalMaster::find($id)->load(['Job', 'JobCountry', 'JobState', 'JobCity']);
        }

        if ($userInfo->userBasicInfos->profile_location_status == 1) {
            $pdf_data['userPlaceInfo'] = UserNativeInfoMaster::with([
                "userCountry",
                "userState",
                "userCity"
            ])
                ->where('user_id', $id)
                ->first();
        }

        if ($userInfo->userBasicInfos->profile_fam_info_status == 1) {
            $pdf_data['UserFamilyInfo'] = UserFamilyInfoMaster::with(['FamilyStatusSubMaster'])
                ->where('user_id', $id)
                ->first();
        }

        if ($userInfo->userBasicInfos->profile_jakt_info_status   == 1) {
            $pdf_data['UserHoroscopeInfo'] = UserHoroscopeInfoMaster::where('user_id', $id)
                ->first();
        }


        if ($userInfo->userBasicInfos->profile_pref_info_status  == 1) {
            $pdf_data['UserPreferenceInfo'] = UserPreferenceInfo::with([
                "HeightTo",
                "HeightFrom",
                "MartialStatus",
                "Salary",
                "Religion",
                "Caste",
                "Star"
            ])
                ->where('user_id', $id)
                ->first();
        }

        $pdf_data['shortList'] = UserShortListInfoMaster::where(['user_id' => $id, 'shortlisted_by' => auth()->user()->id])->first();

        $pdf_data['user_photos'] = UserPhotoMaster::where('user_id', $id)->get();

        $pdf_data['packageInfo'] = UserPackageInfoMaster::where('user_id', auth()->user()->id)->get();

        return $pdf_data;
    }
}
