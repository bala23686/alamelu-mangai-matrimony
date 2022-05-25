<?php

namespace App\Observers\Masters\EducationMaster;

use App\Models\Master\EducationMaster\EducationMaster;
use Illuminate\Support\Facades\Cache;

class EducationMasterObserver
{
    /**
     * Handle the EducationMaster "created" event.
     *
     * @param  \App\Models\EducationMaster  $educationMaster
     * @return void
     */
    public function created(EducationMaster $educationMaster)
    {
        Cache::forget('educationList');
    }

    /**
     * Handle the EducationMaster "updated" event.
     *
     * @param  \App\Models\EducationMaster  $educationMaster
     * @return void
     */
    public function updated(EducationMaster $educationMaster)
    {
        Cache::forget('educationList');
    }

    /**
     * Handle the EducationMaster "deleted" event.
     *
     * @param  \App\Models\EducationMaster  $educationMaster
     * @return void
     */
    public function deleted(EducationMaster $educationMaster)
    {
        Cache::forget('educationList');
    }

    /**
     * Handle the EducationMaster "restored" event.
     *
     * @param  \App\Models\EducationMaster  $educationMaster
     * @return void
     */
    public function restored(EducationMaster $educationMaster)
    {
        Cache::forget('educationList');
    }

    /**
     * Handle the EducationMaster "force deleted" event.
     *
     * @param  \App\Models\EducationMaster  $educationMaster
     * @return void
     */
    public function forceDeleted(EducationMaster $educationMaster)
    {
        Cache::forget('educationList');
    }
}
