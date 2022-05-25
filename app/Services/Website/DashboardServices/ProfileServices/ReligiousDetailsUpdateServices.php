<?php

namespace App\Services\Website\DashboardServices\ProfileServices;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;

class ReligiousDetailsUpdateServices
{
    public function HandleReligiousDetailsUpdate(Request $request, $id)
    {
        $data = [

            "user_religion_id" => $request->user_religion,
            "user_caste_id" => $request->user_caste,
            "sub_caste" => $request->user_subcaste,
            "user_rasi_id" => $request->user_rasi,
            "user_star_id" => $request->user_star,
            "dhosam" => $request->user_dhosam,
            "dhosam_details" => $request->dhosam_details,
            "user_birth_time" => $request->user_btime,
            "user_birth_place" => $request->user_bplace,
        ];
        $is_saved = User::find($id)
            ->userReligeonInfo()->updateOrCreate(['user_id' => $id], $data);

        $is_saved ? UserBasicInfoMaster::where('user_id', $id)
            ->update(["profile_religion_status" => 1])
            : false;
        return $is_saved ? true : false;
    }
}
