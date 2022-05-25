<?php

namespace App\Observers\Masters\CountryMaster;

use App\Models\Master\CountryMaster\CountryMaster;
use Illuminate\Support\Facades\Cache;

class CountryMasterObserver
{
    /**
     * Handle the CountryMaster "created" event.
     *
     * @param  \App\Models\CountryMaster  $countryMaster
     * @return void
     */
    public function created(CountryMaster $countryMaster)
    {
        Cache::forget('countryList');
    }

    /**
     * Handle the CountryMaster "updated" event.
     *
     * @param  \App\Models\CountryMaster  $countryMaster
     * @return void
     */
    public function updated(CountryMaster $countryMaster)
    {
        Cache::forget('countryList');
    }

    /**
     * Handle the CountryMaster "deleted" event.
     *
     * @param  \App\Models\CountryMaster  $countryMaster
     * @return void
     */
    public function deleted(CountryMaster $countryMaster)
    {
        Cache::forget('countryList');
    }

    /**
     * Handle the CountryMaster "restored" event.
     *
     * @param  \App\Models\CountryMaster  $countryMaster
     * @return void
     */
    public function restored(CountryMaster $countryMaster)
    {
        Cache::forget('countryList');
    }

    /**
     * Handle the CountryMaster "force deleted" event.
     *
     * @param  \App\Models\CountryMaster  $countryMaster
     * @return void
     */
    public function forceDeleted(CountryMaster $countryMaster)
    {
        Cache::forget('countryList');
    }
}
