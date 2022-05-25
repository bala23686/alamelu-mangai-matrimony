<?php

namespace App\Services\Website\DashboardServices\ProfileServices;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserProfessionalMaster\UserProfessionalMaster;
use Illuminate\Http\Request;
use App\Models\User;

class ProfessionalDetailsUpdateServices
{
    public function HandleProfessionalDetailsUpdate(Request $request, $id)
    {

        $getEducation = !empty($request->user_education) ? $request->user_education
            : [];
        $education = implode(',', $getEducation);


        $data = [

            "user_education_id" => $education,
            "user_education_details" => $request->user_education_details,
            "user_job_id" => $request->user_job,
            "user_job_details" => $request->user_job_details,
            "user_job_country" => $request->user_working_country != 0 ? $request->user_working_country : null,
            "user_job_state" => $request->user_working_state,
            "user_job_city" => $request->user_working_city,
            "user_annual_income" => $request->user_annual_income,
        ];

        $is_saved = User::find($id)
            ->userProfessinalInfos()
            ->updateOrCreate(['user_id' => $id], $data);

        $is_saved ? UserBasicInfoMaster::where('user_id', $id)
            ->update(["profile_pro_info_status" => 1])
            : false;

        return $is_saved ? true : false;
    }
}
