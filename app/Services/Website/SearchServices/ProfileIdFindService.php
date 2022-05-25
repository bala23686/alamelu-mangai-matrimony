<?php

namespace  App\Services\Website\SearchServices;

use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProfileIdFindService
{
    public function ProfileIdSearch(Request $request)
    {

        $single_user_info = User::where([
            'user_profile_id' => $request->profile_id,
            'is_verified' => 1,
            'profile_status_id' => 1
        ])
            ->with('userBasicInfo')
            ->first();

        return ($single_user_info) ? $single_user_info : false;
    }
}
