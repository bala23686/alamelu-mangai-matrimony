<?php

namespace App\Observers\Masters\PackageMaster;

use App\Models\Master\PackageMaster\PackageMaster;
use Illuminate\Support\Facades\Cache;

class PackageMasterObserver
{
    /**
     * Handle the PackageMaster "created" event.
     *
     * @param  \App\Models\PackageMaster  $packageMaster
     * @return void
     */
    public function created(PackageMaster $packageMaster)
    {
        Cache::forget('packagelist');
    }

    /**
     * Handle the PackageMaster "updated" event.
     *
     * @param  \App\Models\PackageMaster  $packageMaster
     * @return void
     */
    public function updated(PackageMaster $packageMaster)
    {
        Cache::forget('packagelist');
    }

    /**
     * Handle the PackageMaster "deleted" event.
     *
     * @param  \App\Models\PackageMaster  $packageMaster
     * @return void
     */
    public function deleted(PackageMaster $packageMaster)
    {
        Cache::forget('packagelist');
    }

    /**
     * Handle the PackageMaster "restored" event.
     *
     * @param  \App\Models\PackageMaster  $packageMaster
     * @return void
     */
    public function restored(PackageMaster $packageMaster)
    {
        Cache::forget('packagelist');
    }

    /**
     * Handle the PackageMaster "force deleted" event.
     *
     * @param  \App\Models\PackageMaster  $packageMaster
     * @return void
     */
    public function forceDeleted(PackageMaster $packageMaster)
    {
        Cache::forget('packagelist');
    }
}
