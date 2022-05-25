<?php

namespace App\Services\Website\DashboardServices\PartnerPreferenceServices;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use Illuminate\Http\Request;
use App\Models\User;

class ProfessionalPreferenceUpdateServices
{
    public function HandleProfessionalPreferenceUpdate(Request $request, $id)
    {

        $getEducation = !empty($request->partner_education) ? $request->partner_education
            : [];
        $education = implode(',', $getEducation);

        $getJob =  !empty($request->partner_job) ? $request->partner_job
            : [];
        $job = implode(',', $getJob);

        $getJobCountry =  !empty($request->partner_job_country)  ? $request->partner_job_country
            : [];
        $jobCountry = implode(',', $getJobCountry);

        $data = [
            "partner_education" => $education,
            "partner_education_details" => $request->partner_education_details = !0 ? $request->partner_education_details : null,
            "partner_job" => $job,
            "partner_job_details" => $request->partner_job_details = !0 ? $request->partner_job_details : null,
            "partner_job_country" => $jobCountry,
            "partner_salary" => $request->partner_annual_income != 0 ?  $request->partner_annual_income : null,
        ];

        $is_saved = User::find($id)
            ->BasicPartnerInfo()->updateOrCreate(['user_id' => $id], $data);

        $is_saved ? UserBasicInfoMaster::where('user_id', $id)
            ->update(["profile_pref_info_status" => 1])
            : false;

        return $is_saved ? true : false;
    }
}
