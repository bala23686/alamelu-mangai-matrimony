<?php

namespace App\Traits\Controllers\Admin\Masters\NakshathiraMaster;

use App\Http\Resources\Master\Star\StarResource;
use App\Models\Master\StarMaster\StarMaster;
use Illuminate\Http\Request;

trait NakshathiraMasterMethods
{


/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function nakshathiraByRasi(Request $request,$id)
    {

        $star_by_rasi=StarMaster::where('star_rasi_id',$id)->with('Rasi')->get();

        if($request->is('api/*'))
        {
            return StarResource::collection($star_by_rasi);
        }

        return response(json_encode($star_by_rasi));
    }

}
