<?php

namespace App\Services\Website\DashboardServices\PartnerPreferenceServices;

use App\Http\Requests\Website\Dashboard\PartnerPreferenceRequests\BasicPreferenceDetailsRequest;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use Illuminate\Http\Request;
use App\Models\User;

class BasicPartnerPreferenceUpdateServices
{
    public function HandleBasicPartnerPreferenceUpdate(BasicPreferenceDetailsRequest $request, $id)
    {
        $getComplexion = !empty($request->partner_complexion) ? $request->partner_complexion
            : [];
        $complexion = implode(',', $getComplexion);
        $getCountry = !empty($request->partner_country)  ? $request->partner_country
            : [];
        $country = implode(',', $getCountry);
        $getLanguage = !empty($request->partner_mother_tongue) ? $request->partner_mother_tongue
            : [];
        $language = implode(',', $getLanguage);

        $data = [

            "partner_age_from" => $request->partner_age_from != 0 ? $request->partner_age_from : null,
            "partner_age_to" => $request->partner_age_to != 0 ? $request->partner_age_to : null,
            "partner_height_from" => $request->partner_height_from != 0 ? $request->partner_height_from : null,
            "partner_height_to" => $request->partner_height_to != 0 ? $request->partner_height_to : null,
            "partner_martial_status" => $request->partner_martial_status != 0 ? $request->partner_martial_status : null,
            "partner_complexion" => $complexion,
            "partner_mother_tongue" => $language,
            "partner_country" => $country,
            "partner_state" => $request->partner_state != 0 ? $request->partner_state : null,
            "partner_city" => $request->partner_city != 0 ? $request->partner_city : null,

        ];

        $is_saved = User::find($id)
            ->BasicPartnerInfo()->updateOrCreate(['user_id' => $id], $data);

        $is_saved ? UserBasicInfoMaster::where('user_id', $id)
            ->update(["profile_pref_info_status" => 1])
            : false;

        return $is_saved ? true : false;
    }
}
