<?php

namespace App\Traits\Controllers\Admin\Masters\CityMaster;

use App\Http\Resources\Master\City\CityResource;
use App\Models\Master\CityMaster\CityMaster;
use Illuminate\Http\Request;

trait CityMasterMethods
{


/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function citybystate(Request $request, $id)
    {

        $city_by_state=CityMaster::where('state_id',$id)
        ->with('State')
        ->get();

        if($request->is('api/*'))
        {
            return CityResource::collection($city_by_state);
        }

        return response(json_encode($city_by_state));
    }

}
