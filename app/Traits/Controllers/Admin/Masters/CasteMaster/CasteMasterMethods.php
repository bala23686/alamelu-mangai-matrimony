<?php

namespace App\Traits\Controllers\Admin\Masters\CasteMaster;

use App\Models\Master\CasteMaster\CasteMaster;

trait CasteMasterMethods
{


/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function castebyreligion($id)
    {
        return response(json_encode(CasteMaster::where('caste_religion',$id)->get()));
    }

}
