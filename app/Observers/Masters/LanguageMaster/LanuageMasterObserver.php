<?php

namespace App\Observers\Masters\LanguageMaster;

use App\Models\Master\LanguageMaster\LanguageMaster;
use Illuminate\Support\Facades\Cache;

class LanuageMasterObserver
{
    /**
     * Handle the LanguageMaster "created" event.
     *
     * @param  \App\Models\LanguageMaster  $languageMaster
     * @return void
     */
    public function created(LanguageMaster $languageMaster)
    {
        Cache::forget('languageList');
    }

    /**
     * Handle the LanguageMaster "updated" event.
     *
     * @param  \App\Models\LanguageMaster  $languageMaster
     * @return void
     */
    public function updated(LanguageMaster $languageMaster)
    {
        Cache::forget('languageList');
    }

    /**
     * Handle the LanguageMaster "deleted" event.
     *
     * @param  \App\Models\LanguageMaster  $languageMaster
     * @return void
     */
    public function deleted(LanguageMaster $languageMaster)
    {
        Cache::forget('languageList');
    }

    /**
     * Handle the LanguageMaster "restored" event.
     *
     * @param  \App\Models\LanguageMaster  $languageMaster
     * @return void
     */
    public function restored(LanguageMaster $languageMaster)
    {
        Cache::forget('languageList');
    }

    /**
     * Handle the LanguageMaster "force deleted" event.
     *
     * @param  \App\Models\LanguageMaster  $languageMaster
     * @return void
     */
    public function forceDeleted(LanguageMaster $languageMaster)
    {
        Cache::forget('languageList');
    }
}
