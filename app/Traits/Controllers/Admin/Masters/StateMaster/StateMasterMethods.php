<?php

namespace App\Traits\Controllers\Admin\Masters\StateMaster;

use App\Http\Resources\Master\State\StateResource;
use App\Models\Master\StateMaster\StateMaster;
use Illuminate\Http\Request;

trait StateMasterMethods
{


/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statebycountry(Request $request,$id)
    {

        $state_by_country=StateMaster::where('country_id',$id)
                            ->with('Country')
                            ->get();

        if($request->is('api/*'))
        {
            return StateResource::collection($state_by_country);
        }

        return response(json_encode($state_by_country));
    }

}
