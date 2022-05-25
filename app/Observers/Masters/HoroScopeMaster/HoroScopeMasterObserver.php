<?php

namespace App\Observers\Masters\HoroScopeMaster;

use App\Models\Master\HoroScopeMaster\HoroScopeMaster;
use Illuminate\Support\Facades\Cache;

class HoroScopeMasterObserver
{
    /**
     * Handle the HoroScopeMaster "created" event.
     *
     * @param  \App\Models\HoroScopeMaster  $horoScopeMaster
     * @return void
     */
    public function created(HoroScopeMaster $horoScopeMaster)
    {
        Cache::forget('horoscopeList');
    }

    /**
     * Handle the HoroScopeMaster "updated" event.
     *
     * @param  \App\Models\HoroScopeMaster  $horoScopeMaster
     * @return void
     */
    public function updated(HoroScopeMaster $horoScopeMaster)
    {
        Cache::forget('horoscopeList');
    }

    /**
     * Handle the HoroScopeMaster "deleted" event.
     *
     * @param  \App\Models\HoroScopeMaster  $horoScopeMaster
     * @return void
     */
    public function deleted(HoroScopeMaster $horoScopeMaster)
    {
        Cache::forget('horoscopeList');
    }

    /**
     * Handle the HoroScopeMaster "restored" event.
     *
     * @param  \App\Models\HoroScopeMaster  $horoScopeMaster
     * @return void
     */
    public function restored(HoroScopeMaster $horoScopeMaster)
    {
        Cache::forget('horoscopeList');
    }

    /**
     * Handle the HoroScopeMaster "force deleted" event.
     *
     * @param  \App\Models\HoroScopeMaster  $horoScopeMaster
     * @return void
     */
    public function forceDeleted(HoroScopeMaster $horoScopeMaster)
    {
        Cache::forget('horoscopeList');
    }
}
