<?php

namespace App\Observers\Masters\CasteMaster;

use App\Models\Master\CasteMaster\CasteMaster;
use Illuminate\Support\Facades\Cache;

class CasteMasterObserver
{
    /**
     * Handle the CasteMaster "created" event.
     *
     * @param  \App\Models\CasteMaster  $casteMaster
     * @return void
     */
    public function created(CasteMaster $casteMaster)
    {
        Cache::forget('casteList');
    }

    /**
     * Handle the CasteMaster "updated" event.
     *
     * @param  \App\Models\CasteMaster  $casteMaster
     * @return void
     */
    public function updated(CasteMaster $casteMaster)
    {
        Cache::forget('casteList');
    }

    /**
     * Handle the CasteMaster "deleted" event.
     *
     * @param  \App\Models\CasteMaster  $casteMaster
     * @return void
     */
    public function deleted(CasteMaster $casteMaster)
    {
        Cache::forget('casteList');
    }

    /**
     * Handle the CasteMaster "restored" event.
     *
     * @param  \App\Models\CasteMaster  $casteMaster
     * @return void
     */
    public function restored(CasteMaster $casteMaster)
    {
        Cache::forget('casteList');
    }

    /**
     * Handle the CasteMaster "force deleted" event.
     *
     * @param  \App\Models\CasteMaster  $casteMaster
     * @return void
     */
    public function forceDeleted(CasteMaster $casteMaster)
    {
        Cache::forget('casteList');
    }
}
