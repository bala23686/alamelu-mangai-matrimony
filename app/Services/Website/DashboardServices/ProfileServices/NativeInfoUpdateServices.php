<?php

namespace App\Services\Website\DashboardServices\ProfileServices;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use Illuminate\Http\Request;
use App\Models\User;

class NativeInfoUpdateServices
{
    public function HandleNativeDetailsUpdate(Request $request, $id)
    {

        $data = [

            "user_country_id" => $request->user_country,
            "user_state_id" => $request->user_state,
            "user_city_id" => $request->user_city
        ];

        $is_saved = User::find($id)
            ->userNativeInfo()
            ->updateOrCreate(['user_id' => $id], $data);

        $is_saved ? UserBasicInfoMaster::where('user_id', $id)
            ->update(["profile_location_status" => 1])
            : false;

        return $is_saved ? true : false;
    }
}
