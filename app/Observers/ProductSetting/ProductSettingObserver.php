<?php

namespace App\Observers\ProductSetting;

use App\Models\ProductSetting\ProductSetting;
use Illuminate\Support\Facades\Cache;

class ProductSettingObserver
{
    /**
     * Handle the ProductSetting "created" event.
     *
     * @param  \App\Models\ProductSetting  $productSetting
     * @return void
     */
    public function created(ProductSetting $productSetting)
    {
        Cache::forget('productSetting');
        Cache::forget('themeColor');
        Cache::forget('themeSettings');
        Cache::forget('companyLogo');
        Cache::forget('companyWaterMark');
    }

    /**
     * Handle the ProductSetting "updated" event.
     *
     * @param  \App\Models\ProductSetting  $productSetting
     * @return void
     */
    public function updated(ProductSetting $productSetting)
    {
        Cache::forget('productSetting');
        Cache::forget('companyLogo');
        Cache::forget('themeSettings');
        Cache::forget('companyWaterMark');
        Cache::forget('themeColor');
    }

    /**
     * Handle the ProductSetting "deleted" event.
     *
     * @param  \App\Models\ProductSetting  $productSetting
     * @return void
     */
    public function deleted(ProductSetting $productSetting)
    {
        Cache::forget('productSetting');
        Cache::forget('companyLogo');
        Cache::forget('themeSettings');
        Cache::forget('companyWaterMark');
        Cache::forget('themeColor');
    }

    /**
     * Handle the ProductSetting "restored" event.
     *
     * @param  \App\Models\ProductSetting  $productSetting
     * @return void
     */
    public function restored(ProductSetting $productSetting)
    {
        Cache::forget('productSetting');
        Cache::forget('companyLogo');
        Cache::forget('themeSettings');
        Cache::forget('companyWaterMark');
        Cache::forget('themeColor');
    }

    /**
     * Handle the ProductSetting "force deleted" event.
     *
     * @param  \App\Models\ProductSetting  $productSetting
     * @return void
     */
    public function forceDeleted(ProductSetting $productSetting)
    {
        Cache::forget('productSetting');
        Cache::forget('companyLogo');
        Cache::forget('themeSettings');
        Cache::forget('companyWaterMark');
        Cache::forget('themeColor');
    }
}
