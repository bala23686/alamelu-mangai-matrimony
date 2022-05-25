<?php

namespace App\Http\Controllers\Website\MatchProfile;

use App\Http\Controllers\Controller;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Models\User;

class MatchProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $match_profile_details = [
            'users' => UserBasicInfoMaster::with('userInfo')->where('profile_pref_info_status', '=', 1)->where('user_id', '!=', auth()->user()->id)->whereNotIn('user_id', function ($query) {
                $query->select('id')->from('users')->where('profile_status_id', '=', 1);
            })->get()
        ];
        return view('Website.userDashboard.newMatches', $match_profile_details)->with('user', auth()->user());
    }

    public function matchProfile()
    {

        //checking if the current auth() user have preference
        $user_has_preference = UserBasicInfoMaster::find(auth()->user()->id)->profile_pref_info_status;
        $profiles = [];
        $current_user_preference = [];
        //getting the current  auth()  user preference
        if ($user_has_preference) {
            $current_user_preference = UserPreferenceInfo::find(auth()->user()->id);

            $query = User::query();

            $query->with(['userBasicInfo.Gender', 'userReligeonInfo', 'userNativeInfo', 'status', 'UserProfessionInfo'])
                ->whereRelation('userBasicInfo', 'profile_basic_status', '=', 1)
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
            $profiles = $query->where('id', '!=', auth()->user()->id)->paginate(10);


            // dd($profiles[0]->UserProfessionInfo->getRawOriginal('user_education_id') );
            // dd($current_user_preference->partner_complexion->pluck('id'));
        }



        return view('Website.userDashboard.newMatches', compact('profiles', 'current_user_preference', 'user_has_preference'));
    }
}
