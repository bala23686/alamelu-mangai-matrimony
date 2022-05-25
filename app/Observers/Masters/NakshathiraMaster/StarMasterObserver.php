<?php

namespace App\Observers\Masters\NakshathiraMaster;

use App\Models\Master\StarMaster\StarMaster;
use Illuminate\Support\Facades\Cache;

class StarMasterObserver
{
    /**
     * Handle the StarMaster "created" event.
     *
     * @param  \App\Models\StarMaster  $starMaster
     * @return void
     */
    public function created(StarMaster $starMaster)
    {
        Cache::forget('starList');
    }

    /**
     * Handle the StarMaster "updated" event.
     *
     * @param  \App\Models\StarMaster  $starMaster
     * @return void
     */
    public function updated(StarMaster $starMaster)
    {
        Cache::forget('starList');
    }

    /**
     * Handle the StarMaster "deleted" event.
     *
     * @param  \App\Models\StarMaster  $starMaster
     * @return void
     */
    public function deleted(StarMaster $starMaster)
    {
        Cache::forget('starList');
    }

    /**
     * Handle the StarMaster "restored" event.
     *
     * @param  \App\Models\StarMaster  $starMaster
     * @return void
     */
    public function restored(StarMaster $starMaster)
    {
        //
    }

    /**
     * Handle the StarMaster "force deleted" event.
     *
     * @param  \App\Models\StarMaster  $starMaster
     * @return void
     */
    public function forceDeleted(StarMaster $starMaster)
    {
        //
    }
}
