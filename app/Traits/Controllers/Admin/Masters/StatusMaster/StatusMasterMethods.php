<?php

namespace App\Traits\Controllers\Admin\Masters\StatusMaster;

use App\Models\Master\StatusMaster\StatusMaster;
use Illuminate\Support\Facades\Cache;

trait StatusMasterMethods
{


  public function status()
  {


     $data=Cache::rememberForever('statusList', function () {

        return StatusMaster::where('status_status', 1)->get();
    });


    // var_dump($data);
    return response(json_encode($data, 200));

  }


}
