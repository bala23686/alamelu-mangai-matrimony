<?php


namespace App\Providers;

use App\Models\Master\CasteMaster\CasteMaster;
use App\Models\Master\CityMaster\CityMaster;
use App\Models\Master\CountryMaster\CountryMaster;
use App\Models\Master\EducationMaster\EducationMaster;
use App\Models\Master\HoroScopeMaster\HoroScopeMaster;
use App\Models\Master\JobMaster\JobMaster;
use App\Models\Master\LanguageMaster\LanguageMaster;
use App\Models\Master\PackageMaster\PackageMaster;
use App\Models\Master\RasiMaster\RasiMaster;
use App\Models\Master\ReligionMaster\ReligionMaster;
use App\Models\Master\StarMaster\StarMaster;
use App\Models\Master\StateMaster\StateMaster;
use App\Models\Master\StatusMaster\StatusMaster;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserFamilyInfoMaster\UserFamilyInfoMaster;
use App\Models\ProductSetting\ProductSetting;
use App\Observers\Masters\CasteMaster\CasteMasterObserver;
use App\Observers\Masters\CityMaster\CityMasterObserver;
use App\Observers\Masters\CountryMaster\CountryMasterObserver;
use App\Observers\Masters\EducationMaster\EducationMasterObserver;
use App\Observers\Masters\HoroScopeMaster\HoroScopeMasterObserver;
use App\Observers\Masters\JobMaster\JobMasterObserver;
use App\Observers\Masters\LanguageMaster\LanuageMasterObserver;
use App\Observers\Masters\NakshathiraMaster\StarMasterObserver;
use App\Observers\Masters\PackageMaster\PackageMasterObserver;
use App\Observers\Masters\RasiMaster\RasiMasterObserver;
use App\Observers\Masters\ReligionMaster\ReligionMasterObserver;
use App\Observers\Masters\StateMaster\StateMasterObserver;
use App\Observers\Masters\StatusMaster\StatusMasterObserver;
use App\Observers\ProductSetting\ProductSettingObserver;
use App\Observers\User\UserBasicInfo\UserBasicInfoObserver;
use App\Observers\User\UserFamilyInfo\UserFamilyInfoObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\UserCreated' => [
            'App\Listeners\SendWelcomeEmail',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        RasiMaster::observe(RasiMasterObserver::class);
        StarMaster::observe(StarMasterObserver::class);
        ReligionMaster::observe(ReligionMasterObserver::class);
        CasteMaster::observe(CasteMasterObserver::class);
        CountryMaster::observe(CountryMasterObserver::class);
        StateMaster::observe(StateMasterObserver::class);
        CityMaster::observe(CityMasterObserver::class);
        EducationMaster::observe(EducationMasterObserver::class);
        LanguageMaster::observe(LanuageMasterObserver::class);
        JobMaster::observe(JobMasterObserver::class);
        HoroScopeMaster::observe(HoroScopeMasterObserver::class);
        PackageMaster::observe(PackageMasterObserver::class);
        StatusMaster::observe(StatusMasterObserver::class);
        ProductSetting::observe(ProductSettingObserver::class);
        UserBasicInfoMaster::observe(UserBasicInfoObserver::class);
        UserFamilyInfoMaster::observe(UserFamilyInfoObserver::class);
    }
}
