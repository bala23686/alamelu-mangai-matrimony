<?php

namespace App\Services\Website\DashboardServices\PartnerPreferenceServices;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;

class ReligiousPreferenceUpdateServices
{
    public function HandleReligiousPreferenceUpdate(Request $request, $id)
    {
        $getRasi = !empty($request->partner_rasi) ? $request->partner_rasi : [];
        $rasi = implode(',', $getRasi);
        $data = [

            "partner_religion" => $request->partner_religion != 0 ? $request->partner_religion  : null,
            "partner_caste" => $request->partner_caste != 0 ? $request->partner_caste : null,
            // "partner_star" => $request->partner_star != 0 ? $request->partner_star : null,
            "partner_rasi" => $rasi,
            "caste_no_bar" => $request->caste_no_bar != 0 ? $request->caste_no_bar : null,

        ];

        $is_saved = User::find($id)
            ->BasicPartnerInfo()->updateOrCreate(['user_id' => $id], $data);

        $is_saved ? UserBasicInfoMaster::where('user_id', $id)
            ->update(["profile_pref_info_status" => 1])
            : false;

        return $is_saved ? true : false;
    }
}
