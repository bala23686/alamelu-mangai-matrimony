<?php

namespace App\Services\Website\DashboardServices\ProfileServices;

use App\Http\Requests\Website\Dashboard\ProfilesRequests\FamilyDetailsRequest;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserFamilyInfoMaster\UserFamilyInfoMaster;
use Illuminate\Http\Request;
use App\Models\User;

class FamilyDetailsUpdateServices
{
    public function HandleUpdateFamilyDetails(FamilyDetailsRequest $request, $id)
    {

        $data = [
            "user_father_name" => $request->user_father_name,
            "user_father_job_details" => $request->user_father_job_details,
            "user_mother_name" => $request->user_mother_name,
            "user_mother_job_details" => $request->user_mother_job_details,
            "user_family_status" => $request->user_family_status,
            "no_of_sibling" => $request->no_of_sibling,
            "no_of_brothers" => $request->no_of_brothers,
            "no_of_sisters" => $request->no_of_sisters,
            "no_of_brothers_married" => $request->no_of_brothers_married,
            "no_of_sisters_married" => $request->no_of_sisters_married,
            "user_sibling_details" => $request->user_sibling_details,
        ];

        $is_saved = User::find($id)
            ->userFamilyInfos()
            ->updateOrCreate(['user_id' => $id], $data);

        $is_saved ? UserBasicInfoMaster::where('user_id', $id)
            ->update(["profile_fam_info_status" => 1])
            : false;

        return $is_saved ? true : false;
    }
}
