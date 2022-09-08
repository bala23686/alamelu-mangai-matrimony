<?php

namespace App\Services\Profiles;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Models\User;
use Illuminate\Http\Request;

class UserMatchService
{


    public function execute(Request $request)
    {

        //checking if the current auth() user have preference
        $user_has_preference = UserBasicInfoMaster::find(auth()->user()->id)->profile_pref_info_status;
        $profiles = [];
        $current_user_preference = [];
        //getting the current  auth()  user preference
        if ($user_has_preference) {
            $current_user_preference = UserPreferenceInfo::find(auth()->user()->id);

            $query = User::query();

            $query->with([
                'userBasicInfo.Gender',
                'userBasicInfo.Height',
                'userBasicInfo.MotherTongue',
                'userBasicInfo.MartialStatus',
                'userBasicInfo.EatingHabit',
                'userBasicInfo.Complex',
                'UserFamilyInfo',
                'userReligeonInfo.BelognsToReligion',
                'userReligeonInfo.BelongsToCaste',
                'userReligeonInfo.BelongsToRasi',
                'userReligeonInfo.BelongsToStar',
                'userNativeInfo.Country',
                'userNativeInfo.State',
                'userNativeInfo.City',
                'status',
                'UserProfessionInfo',
                'BasicPartnerInfo',
                'userHoroScopeInfo'
            ])->whereRelation('userBasicInfo', 'profile_basic_status', '=', 1)
                ->whereRelation('userBasicInfo', 'profile_location_status', '=', 1)
                ->whereRelation('userBasicInfo', 'profile_pro_info_status', '=', 1)
                ->whereRelation('userBasicInfo', 'profile_religion_status', '=', 1);

            //gender should be opposite
            $gender = auth()->user()->userBasicInfo->gender_id == 1 ? 2 : 1;
            // 1.scopeGenderFilter
            $query->GenderFilter($gender);


            //religion & caste my be same
            // 2.scopeCasteFilter
            $caste = auth()->user()->userReligeonInfo->user_caste_id;
            $query->casteFilter($caste);
            // userReligeonInfo
            //verified user & should be active

            // 3.scopeUserStatus
            // 4.scopeUserVerified
            $query->userVerified();
            //final statement to load user info

            if ($request->is('api/*')) {
                $profiles = $query->where('id', '!=', auth()->user()->id)->get();
            } else {
                $profiles = $query->where('id', '!=', auth()->user()->id)->paginate(10);
            }



            return [$profiles, $current_user_preference, $user_has_preference];
        }
    }
}
