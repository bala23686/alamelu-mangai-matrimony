<?php

namespace App\Observers\User\UserFamilyInfo;

use App\Models\Master\UserFamilyInfoMaster\UserFamilyInfoMaster;
use Illuminate\Support\Facades\Cache;

class UserFamilyInfoObserver
{
    /**
     * Handle the UserFamilyInfoMaster "created" event.
     *
     * @param  \App\Models\UserFamilyInfoMaster  $userFamilyInfoMaster
     * @return void
     */
    public function created(UserFamilyInfoMaster $userFamilyInfoMaster)
    {
        Cache::forget('user_famil_info'.$userFamilyInfoMaster->user_id);
    }

    /**
     * Handle the UserFamilyInfoMaster "updated" event.
     *
     * @param  \App\Models\UserFamilyInfoMaster  $userFamilyInfoMaster
     * @return void
     */
    public function updated(UserFamilyInfoMaster $userFamilyInfoMaster)
    {
        Cache::forget('user_famil_info'.$userFamilyInfoMaster->user_id);
    }

    /**
     * Handle the UserFamilyInfoMaster "deleted" event.
     *
     * @param  \App\Models\UserFamilyInfoMaster  $userFamilyInfoMaster
     * @return void
     */
    public function deleted(UserFamilyInfoMaster $userFamilyInfoMaster)
    {
        Cache::forget('user_famil_info'.$userFamilyInfoMaster->user_id);
    }

    /**
     * Handle the UserFamilyInfoMaster "restored" event.
     *
     * @param  \App\Models\UserFamilyInfoMaster  $userFamilyInfoMaster
     * @return void
     */
    public function restored(UserFamilyInfoMaster $userFamilyInfoMaster)
    {
        Cache::forget('user_famil_info'.$userFamilyInfoMaster->user_id);
    }

    /**
     * Handle the UserFamilyInfoMaster "force deleted" event.
     *
     * @param  \App\Models\UserFamilyInfoMaster  $userFamilyInfoMaster
     * @return void
     */
    public function forceDeleted(UserFamilyInfoMaster $userFamilyInfoMaster)
    {
        Cache::forget('user_famil_info'.$userFamilyInfoMaster->user_id);
    }
}
