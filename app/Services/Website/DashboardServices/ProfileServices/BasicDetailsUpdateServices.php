<?php

namespace  App\Services\Website\DashboardServices\ProfileServices;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\User;
use Illuminate\Http\Request;

class BasicDetailsUpdateServices
{
    public function HandleBasicDetails(Request $request, $id)
    {
        $data = [
            "user_full_name" => $request->user_full_name,
            "user_mobile_no" => $request->mobile,
            "about" => $request->about,
            "age" => $request->age,
            "dob" => $request->dob,
            "gender_id" => $request->gender,
            "user_height_id" => $request->height,
            "user_complexion_id" => $request->user_complexion,
            "user_mother_tongue" => $request->mother_tongue,
            "martial_id" => $request->martial_status,
            "user_eating_habit_id" => $request->eating_habit,
            "is_disable" => $request->disability,
            "profile_basic_status" => 1
        ];


        $is_saved = User::find($id)
            ->userBasicInfo()
            ->updateOrCreate(['user_id' => $id], $data);


        return $is_saved ? true : false;
    }
}
