<?php

namespace App\Services\Profiles;

use App\Models\User;

class UserProfileService
{


    public function execute()
    {

        $profiles_query = User::query();

        //loading relationships
        $profiles_query->with([
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
            'GalleryInfo',
            'userHoroScopeInfo',
        ]);

        //gender should be opposite
        $gender = auth()->user()->userBasicInfo->gender_id == 1 ? 2 : 1;
        // 1.scopeGenderFilter
        $profiles_query->GenderFilter($gender);


        //religion & caste my be same
        // 2.scopeCasteFilter
        $caste = auth()->user()->userReligeonInfo->user_caste_id;
        $profiles_query->casteFilter($caste);
        // userReligeonInfo
        //verified user & should be active

        // 3.scopeUserStatus
        // 4.scopeUserVerified
        $profiles_query->userVerified();
        //final statement to load user info
        $profiles = $profiles_query->where('id', '!=', auth()->user()->id)->paginate(10);

        return $profiles;
    }
}
