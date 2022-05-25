<?php

namespace App\Observers\Masters\StateMaster;

use App\Models\Master\StateMaster\StateMaster;
use Illuminate\Support\Facades\Cache;

class StateMasterObserver
{
    /**
     * Handle the StateMaster "created" event.
     *
     * @param  \App\Models\StateMaster  $stateMaster
     * @return void
     */
    public function created(StateMaster $stateMaster)
    {
        Cache::forget('stateList');
    }

    /**
     * Handle the StateMaster "updated" event.
     *
     * @param  \App\Models\StateMaster  $stateMaster
     * @return void
     */
    public function updated(StateMaster $stateMaster)
    {
        Cache::forget('stateList');
    }

    /**
     * Handle the StateMaster "deleted" event.
     *
     * @param  \App\Models\StateMaster  $stateMaster
     * @return void
     */
    public function deleted(StateMaster $stateMaster)
    {
        Cache::forget('stateList');
    }

    /**
     * Handle the StateMaster "restored" event.
     *
     * @param  \App\Models\StateMaster  $stateMaster
     * @return void
     */
    public function restored(StateMaster $stateMaster)
    {
        Cache::forget('stateList');
    }

    /**
     * Handle the StateMaster "force deleted" event.
     *
     * @param  \App\Models\StateMaster  $stateMaster
     * @return void
     */
    public function forceDeleted(StateMaster $stateMaster)
    {
        Cache::forget('stateList');
    }
}
