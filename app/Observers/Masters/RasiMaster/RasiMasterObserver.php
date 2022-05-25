<?php

namespace App\Observers\Masters\RasiMaster;

use App\Models\Master\RasiMaster\RasiMaster;
use Illuminate\Support\Facades\Cache;

class RasiMasterObserver
{
    /**
     * Handle the RasiMaster "created" event.
     *
     * @param  \App\Models\RasiMaster  $rasiMaster
     * @return void
     */
    public function created(RasiMaster $rasiMaster)
    {
        Cache::forget('rasiList');
    }

    /**
     * Handle the RasiMaster "updated" event.
     *
     * @param  \App\Models\RasiMaster  $rasiMaster
     * @return void
     */
    public function updated(RasiMaster $rasiMaster)
    {
        Cache::forget('rasiList');
    }

    /**
     * Handle the RasiMaster "deleted" event.
     *
     * @param  \App\Models\RasiMaster  $rasiMaster
     * @return void
     */
    public function deleted(RasiMaster $rasiMaster)
    {
        Cache::forget('rasiList');
    }

    /**
     * Handle the RasiMaster "restored" event.
     *
     * @param  \App\Models\RasiMaster  $rasiMaster
     * @return void
     */
    public function restored(RasiMaster $rasiMaster)
    {
        //
    }

    /**
     * Handle the RasiMaster "force deleted" event.
     *
     * @param  \App\Models\RasiMaster  $rasiMaster
     * @return void
     */
    public function forceDeleted(RasiMaster $rasiMaster)
    {
        //
    }
}
