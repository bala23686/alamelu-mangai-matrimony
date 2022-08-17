<?php

namespace App\Http\Controllers\Api\v1\Users\UserProfiles;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Services\Profiles\UserMatchService;
use Illuminate\Http\Request;

class UserMatchsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, UserMatchService $service)
    {
        [$profiles, $current_user_preference, $user_has_preference] = $service->execute($request);
        // dd($profiles);
        if ($user_has_preference && $profiles) {

            collect($profiles)->each(function ($profile) use ($current_user_preference) {

                $match_count = 0;

                if ($profile->userBasicInfos->age >= $current_user_preference->partner_age_from && $profile->userBasicInfos->age <= $current_user_preference->partner_age_to) {
                    $match_count++;
                }
                if ($profile->userBasicInfos->user_height_id >= $current_user_preference->partner_height_from || $profile->userBasicInfos->user_height_id <= $current_user_preference->partner_height_to) {
                    $match_count++;
                }
                if ($profile->userBasicInfos->martial_id == $current_user_preference->partner_martial_status) {
                    $match_count++;
                }
                if (array_key_exists($profile->userBasicInfos->user_complexion_id, $current_user_preference->partner_complexion->pluck('id'))) {
                    $match_count++;
                }
                if (array_key_exists($profile->userBasicInfos->user_mother_tongue, $current_user_preference->partner_mother_tongue->pluck('id'))) {
                    $match_count++;
                }
                if (array_key_exists($profile->UserProfessionInfo->user_job_id, $current_user_preference->partner_job->pluck('id'))) {
                    $match_count++;
                }
                if (substr_compare($profile->UserProfessionInfo->getRawOriginal('user_education_id'), $current_user_preference->getRawOriginal('partner_education'), 0) == 0) {
                    $match_count++;
                }
                if (array_key_exists($profile->UserProfessionInfo->user_job_country, $current_user_preference->partner_job_country->pluck('id'))) {
                    $match_count++;
                }
                if ($profile->UserProfessionInfo->user_annual_income >= $current_user_preference->partner_salary && $profile->UserProfessionInfo->user_annual_income <= $current_user_preference->partner_salary) {
                    $match_count++;
                }
                if (array_key_exists($profile->userReligeonInfo->user_rasi_id, $current_user_preference->partner_rasi->pluck('id'))) {
                    $match_count++;
                }
                if (array_key_exists($profile->userNativeInfo->user_country_id, $current_user_preference->partner_country->pluck('id'))) {
                    $match_count++;
                }

                $profile->setMatch($match_count);
            });

            return response()->json(['data' => $profiles], 200);
        }

        return response()->json(["message" => "User Does Not Have Preference"], 200);
    }
}
