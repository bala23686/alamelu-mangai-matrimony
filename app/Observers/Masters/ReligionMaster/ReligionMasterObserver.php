<?php

namespace App\Observers\Masters\ReligionMaster;

use App\Models\Master\ReligionMaster\ReligionMaster ;
use Illuminate\Support\Facades\Cache;

class ReligionMasterObserver
{
    /**
     * Handle the ReligionMaster "created" event.
     *
     * @param  \App\Models\ReligionMaster  $religionMaster
     * @return void
     */
    public function created(ReligionMaster $religionMaster)
    {
        Cache::forget('religionList');
    }

    /**
     * Handle the ReligionMaster "updated" event.
     *
     * @param  \App\Models\ReligionMaster  $religionMaster
     * @return void
     */
    public function updated(ReligionMaster $religionMaster)
    {
        Cache::forget('religionList');
    }

    /**
     * Handle the ReligionMaster "deleted" event.
     *
     * @param  \App\Models\ReligionMaster  $religionMaster
     * @return void
     */
    public function deleted(ReligionMaster $religionMaster)
    {
        Cache::forget('religionList');
    }

    /**
     * Handle the ReligionMaster "restored" event.
     *
     * @param  \App\Models\ReligionMaster  $religionMaster
     * @return void
     */
    public function restored(ReligionMaster $religionMaster)
    {
        Cache::forget('religionList');
    }

    /**
     * Handle the ReligionMaster "force deleted" event.
     *
     * @param  \App\Models\ReligionMaster  $religionMaster
     * @return void
     */
    public function forceDeleted(ReligionMaster $religionMaster)
    {
        Cache::forget('religionList');
    }
}
