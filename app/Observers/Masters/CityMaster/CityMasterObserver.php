<?php

namespace App\Observers\Masters\CityMaster;

use App\Models\Master\CityMaster\CityMaster;
use Illuminate\Support\Facades\Cache;

class CityMasterObserver
{
    /**
     * Handle the CityMaster "created" event.
     *
     * @param  \App\Models\CityMaster  $cityMaster
     * @return void
     */
    public function created(CityMaster $cityMaster)
    {
        Cache::forget('cityList');
    }

    /**
     * Handle the CityMaster "updated" event.
     *
     * @param  \App\Models\CityMaster  $cityMaster
     * @return void
     */
    public function updated(CityMaster $cityMaster)
    {
        Cache::forget('cityList');
    }

    /**
     * Handle the CityMaster "deleted" event.
     *
     * @param  \App\Models\CityMaster  $cityMaster
     * @return void
     */
    public function deleted(CityMaster $cityMaster)
    {
        Cache::forget('cityList');
    }

    /**
     * Handle the CityMaster "restored" event.
     *
     * @param  \App\Models\CityMaster  $cityMaster
     * @return void
     */
    public function restored(CityMaster $cityMaster)
    {
        Cache::forget('cityList');
    }

    /**
     * Handle the CityMaster "force deleted" event.
     *
     * @param  \App\Models\CityMaster  $cityMaster
     * @return void
     */
    public function forceDeleted(CityMaster $cityMaster)
    {
        Cache::forget('cityList');
    }
}
