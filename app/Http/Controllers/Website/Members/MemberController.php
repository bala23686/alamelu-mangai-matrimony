<?php

namespace App\Http\Controllers\Website\Members;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {

        $profiles_query = User::query();

        //loading relationships
        $profiles_query->with(['userBasicInfo.Gender', 'userReligeonInfo', 'userNativeInfo','status','UserProfessionInfo']);

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

        // dd($profiles[0]->id);
        // $profile->userBasicInfo->imageWithPath
        // dd($profiles);

        return view('Website.profiles',compact('profiles'));
    }
}
