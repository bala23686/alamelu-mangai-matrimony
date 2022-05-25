<?php

namespace  App\Services\Website\SearchServices;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Framework\Constraint\IsEmpty;

use function PHPUnit\Framework\isEmpty;

class BasicSearchService
{
    public function BasicSearch(Request $request)
    {

        if (Auth()->check() && Auth()->user()->is_admin != 1) {
            $gender = UserBasicInfoMaster::select('gender_id')->where('user_id', Auth()->user()->id)->first();
            $gender_id = $gender->gender_id == 1 ? 2 : 1;
        } else {
            $gender_id = $request->search_gender;
        }

        $basic_search_query = UserBasicInfoMaster::query()
            ->with([
                'user',
                'religious_info',
                'genderInfo',
                'MartialStatus'
            ]);

        $basic_search_data = $basic_search_query
            ->where([
                'gender_id' => $gender_id,
                'martial_id' => $request->search_marital
            ])
            ->whereRelation(
                'religious_info',
                'user_religion_id',
                '=',
                $request->search_religion

            )
            ->whereRelation(
                'religious_info',
                'user_caste_id',
                '=',
                $request->search_caste

            )
            ->whereBetween(
                'user_basic_info_masters.age',
                [
                    $request->search_from_age, $request->search_to_age
                ]
            )
            ->whereRelation('user', ['is_verified' => 1, 'profile_status_id' => 1])
            ->get();

        // dd($basic_search_data);

        return ($basic_search_data->isEmpty()) ? false  : $basic_search_data;
    }
}
