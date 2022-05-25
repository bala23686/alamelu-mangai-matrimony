<?php

namespace App\Http\Controllers\Website\DynamicDropDown;

use App\Http\Controllers\Controller;
use App\Models\Master\CityMaster\CityMaster;
use App\Models\Master\StateMaster\StateMaster;
use Illuminate\Http\Request;
use App\Models\Master\CasteMaster\CasteMaster;
use App\Models\Master\StarMaster\StarMaster;

class CountryStateCityController extends Controller
{
    /**
     * return states list.
     *
     * @return json
     */
    public function getStates(Request $request)
    {
        $states = StateMaster::where('country_id', $request->country_id)->get();

        if (count($states) > 0) {
            return response()->json($states);
        }
    }

    /**
     * return cities list
     *
     * @return json
     */
    public function getCities(Request $request)
    {
        $cities = CityMaster::where('state_id', $request->state_id)->get();

        if (count($cities) > 0) {
            return response()->json($cities);
        }
    }

    public function getCaste(Request $request)
    {
        $religion_caste = CasteMaster::where('caste_religion', $request->religion_id)->get();
        return response()->json($religion_caste);
    }
    public function getStar(Request $request)
    {
        $rasi_star = StarMaster::where('star_rasi_id', $request->rasi_id)->get();
        return response()->json($rasi_star);
    }
}
