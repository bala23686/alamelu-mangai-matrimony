<?php

namespace Database\Seeders;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserFamilyInfoMaster\UserFamilyInfoMaster;
use App\Models\Master\UserHoroscopeInfoMaster\UserHoroscopeInfoMaster;
use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Models\Master\UserProfessionalMaster\UserProfessionalMaster;
use App\Models\Master\UserReligiousInfoMaster\UserReligiousInfoMaster;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::factory()->count(100)->create()->each(function ($user) {
            $user->userBasicInfo()->save(UserBasicInfoMaster::factory()->make());
            $user->userReligeonInfo()->save(UserReligiousInfoMaster::factory()->make());
            $user->userNativeInfo()->save(UserNativeInfoMaster::factory()->make());
            $user->userPackageInfo()->save(UserPackageInfoMaster::factory()->make());
            $user->userFamilyInfos()->save(UserFamilyInfoMaster::factory()->make());
            $user->userHoroScopeInfo()->save(UserHoroscopeInfoMaster::factory()->make());
            $user->userPreferrenceInfo()->save(UserPreferenceInfo::factory()->make());
            $user->userProfessinalInfos()->save(UserProfessionalMaster::factory()->make());
        });
    }
}
