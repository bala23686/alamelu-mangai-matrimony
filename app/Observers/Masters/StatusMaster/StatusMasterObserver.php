<?php

namespace App\Observers\Masters\StatusMaster;

use App\Models\Master\StatusMaster\StatusMaster;
use Illuminate\Support\Facades\Cache;

class StatusMasterObserver
{
    /**
     * Handle the StatusMaster "created" event.
     *
     * @param  \App\Models\StatusMaster  $statusMaster
     * @return void
     */
    public function created(StatusMaster $statusMaster)
    {
        Cache::forget('statusList');
    }

    /**
     * Handle the StatusMaster "updated" event.
     *
     * @param  \App\Models\StatusMaster  $statusMaster
     * @return void
     */
    public function updated(StatusMaster $statusMaster)
    {
        Cache::forget('statusList');
    }

    /**
     * Handle the StatusMaster "deleted" event.
     *
     * @param  \App\Models\StatusMaster  $statusMaster
     * @return void
     */
    public function deleted(StatusMaster $statusMaster)
    {
        Cache::forget('statusList');
    }

    /**
     * Handle the StatusMaster "restored" event.
     *
     * @param  \App\Models\StatusMaster  $statusMaster
     * @return void
     */
    public function restored(StatusMaster $statusMaster)
    {
        Cache::forget('statusList');
    }

    /**
     * Handle the StatusMaster "force deleted" event.
     *
     * @param  \App\Models\StatusMaster  $statusMaster
     * @return void
     */
    public function forceDeleted(StatusMaster $statusMaster)
    {
        Cache::forget('statusList');
    }
}
