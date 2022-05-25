<?php

namespace App\Observers\User\UserBasicInfo;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use Illuminate\Support\Facades\Cache;

class UserBasicInfoObserver
{
    /**
     * Handle the UserBasicInfoMaster "created" event.
     *
     * @param  \App\Models\UserBasicInfoMaster  $userBasicInfoMaster
     * @return void
     */
    public function created(UserBasicInfoMaster $userBasicInfoMaster)
    {
        Cache::forget('user_basic_info'.$userBasicInfoMaster->user_id);
    }

    /**
     * Handle the UserBasicInfoMaster "updated" event.
     *
     * @param  \App\Models\UserBasicInfoMaster  $userBasicInfoMaster
     * @return void
     */
    public function updated(UserBasicInfoMaster $userBasicInfoMaster)
    {
        Cache::forget('user_basic_info'.$userBasicInfoMaster->user_id);
    }

    /**
     * Handle the UserBasicInfoMaster "deleted" event.
     *
     * @param  \App\Models\UserBasicInfoMaster  $userBasicInfoMaster
     * @return void
     */
    public function deleted(UserBasicInfoMaster $userBasicInfoMaster)
    {
        Cache::forget('user_basic_info'.$userBasicInfoMaster->user_id);
    }

    /**
     * Handle the UserBasicInfoMaster "restored" event.
     *
     * @param  \App\Models\UserBasicInfoMaster  $userBasicInfoMaster
     * @return void
     */
    public function restored(UserBasicInfoMaster $userBasicInfoMaster)
    {
        Cache::forget('user_basic_info'.$userBasicInfoMaster->user_id);
    }

    /**
     * Handle the UserBasicInfoMaster "force deleted" event.
     *
     * @param  \App\Models\UserBasicInfoMaster  $userBasicInfoMaster
     * @return void
     */
    public function forceDeleted(UserBasicInfoMaster $userBasicInfoMaster)
    {
        Cache::forget('user_basic_info'.$userBasicInfoMaster->user_id);
    }
}
