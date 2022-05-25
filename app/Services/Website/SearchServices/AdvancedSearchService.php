<?php

namespace  App\Services\Website\SearchServices;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class AdvancedSearchService
{
    public function AdvancedSearch(Request $request)
    {

        if (Auth()->check() && Auth()->user()->is_admin != 1) {
            $gender = UserBasicInfoMaster::select('gender_id')->where('user_id', Auth()->user()->id)->first();
            $gender_id = $gender->gender_id == 1 ? 2 : 1;
        } else {
            $gender_id = $request->adv_gender;
        }

        $adv_search_query = UserBasicInfoMaster::query()
            ->with([
                'user',
                'religious_info',
                'professional_info',
                'native_info',
                'genderInfo',
                'MartialStatus'
            ]);

        if (Auth()->check() && Auth()->user()->is_admin != 1) {
            $adv_search_query->where('gender_id', $gender_id);
        } else if ($request->adv_gender != null) {
            $adv_search_query->where('gender_id', $gender_id);
        }

        if ($request->adv_marital != null) {
            $adv_search_query->where('martial_id', $request->adv_marital);
        }

        if ($request->adv_mother_tounge != null) {
            $adv_search_query->where('user_mother_tongue', $request->adv_mother_tounge);
        }

        if ($request->adv_religion != null) {
            $adv_search_query->whereRelation('religious_info', 'user_religion_id', '=', $request->adv_religion);
        }

        if ($request->adv_caste != null) {
            $adv_search_query->whereRelation('religious_info', 'user_caste_id', '=', $request->adv_caste);
        }

        if ($request->adv_rasi != null) {
            $adv_search_query->whereRelation('religious_info', 'user_rasi_id', '=', $request->adv_rasi);
        }

        if ($request->adv_star != null) {
            $adv_search_query->whereRelation('religious_info', 'user_star_id', '=', $request->adv_star);
        }

        if ($request->adv_education != null) {
            $adv_search_query->whereRelation('professional_info', 'user_education_id', '=', $request->adv_education);
        }

        if ($request->adv_job != null) {
            $adv_search_query->whereRelation('professional_info', 'user_job_id', '=', $request->adv_job);
        }

        if ($request->adv_country != null) {
            $adv_search_query->whereRelation('native_info', 'user_country_id', '=', $request->adv_country);
        }

        if ($request->adv_state != null) {
            $adv_search_query->whereRelation('native_info', 'user_state_id', '=', $request->adv_state);
        }

        if ($request->adv_city != null) {
            $adv_search_query->whereRelation('native_info', 'user_city_id', '=', $request->adv_city);
        }

        $adv_search_query->whereRelation('user', ['is_verified' => 1, 'profile_status_id' => 1]);

        $adv_search_data = $adv_search_query->Paginate(5);

        // dd($request->has('adv_marital'));

        return ($adv_search_data->isEmpty()) ? false  : $adv_search_data;
    }
}
