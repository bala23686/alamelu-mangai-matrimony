<?php

namespace App\Providers;

use App\Helpers\Model\ProductSetting\CompanySettingHelper;
use App\Helpers\Model\ProductSetting\PackageSettingHelper;
use App\Helpers\Model\ProductSetting\PrivacySettingHelper;
use App\Helpers\Model\ProductSetting\ThemeSettingHelper;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share([
            'webInfo' => CompanySettingHelper::all(),
            'themeInfo'=> ThemeSettingHelper::all()
        ]);
    }
}
