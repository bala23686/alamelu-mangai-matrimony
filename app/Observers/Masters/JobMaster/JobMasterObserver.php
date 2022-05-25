<?php

namespace App\Observers\Masters\JobMaster;

use App\Models\Master\JobMaster\JobMaster;
use Illuminate\Support\Facades\Cache;

class JobMasterObserver
{
    /**
     * Handle the JobMaster "created" event.
     *
     * @param  \App\Models\JobMaster  $jobMaster
     * @return void
     */
    public function created(JobMaster $jobMaster)
    {
        Cache::forget('jobList');
    }

    /**
     * Handle the JobMaster "updated" event.
     *
     * @param  \App\Models\JobMaster  $jobMaster
     * @return void
     */
    public function updated(JobMaster $jobMaster)
    {
        Cache::forget('jobList');
    }

    /**
     * Handle the JobMaster "deleted" event.
     *
     * @param  \App\Models\JobMaster  $jobMaster
     * @return void
     */
    public function deleted(JobMaster $jobMaster)
    {
        Cache::forget('jobList');
    }

    /**
     * Handle the JobMaster "restored" event.
     *
     * @param  \App\Models\JobMaster  $jobMaster
     * @return void
     */
    public function restored(JobMaster $jobMaster)
    {
        Cache::forget('jobList');
    }

    /**
     * Handle the JobMaster "force deleted" event.
     *
     * @param  \App\Models\JobMaster  $jobMaster
     * @return void
     */
    public function forceDeleted(JobMaster $jobMaster)
    {
        Cache::forget('jobList');
    }
}
