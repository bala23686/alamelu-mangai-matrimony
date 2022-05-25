<?php

namespace App\Traits\Model\User;

use App\Models\Master\ProfileMatchMaster\ProfileMatchMaster;
use App\Models\Master\StatusMaster\StatusMaster;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserFamilyInfoMaster\UserFamilyInfoMaster;
use App\Models\Master\UserHoroscopeInfoMaster\UserHoroscopeInfoMaster;
use App\Models\Master\UserLog\UserLog;
use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Models\Master\UserProfessionalMaster\UserProfessionalMaster;
use App\Models\Master\UserReligiousInfoMaster\UserReligiousInfoMaster;
use App\Models\Master\UserShortListInfoMaster\UserShortListInfoMaster;
use App\Models\UserTransaction\UserTransaction;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait UserRelations
{

    use UserScopes;

    /**
     * Get the user associated with the UserRelations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status(): HasOne
    {
        return $this->hasOne(StatusMaster::class, 'id', 'profile_status_id');
    }
    /**
     * Get the user associated with the UserRelations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userBasicInfo(): HasOne
    {
        return $this->hasOne(UserBasicInfoMaster::class, 'user_id', 'id');
    }

    /**
     * Get the user associated with the UserRelations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userReligeonInfo(): HasOne
    {
        return $this->hasOne(UserReligiousInfoMaster::class, 'user_id', 'id');
    }

    /**
     * Get the user associated with the UserRelations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userNativeInfo(): HasOne
    {
        return $this->hasOne(UserNativeInfoMaster::class, 'user_id', 'id');
    }


    /**
     * Get the user associated with the UserRelations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userPackageInfo(): HasOne
    {
        return $this->hasOne(UserPackageInfoMaster::class, 'user_id', 'id');
    }

    /**
     * Get the user associated with the UserRelations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userHoroScopeInfo(): HasOne
    {
        return $this->hasOne(UserHoroscopeInfoMaster::class, 'user_id', 'id');
    }

    /**
     * Get the user associated with the UserRelations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userFamilyInfos(): HasOne
    {
        return $this->hasOne(UserFamilyInfoMaster::class, 'user_id', 'id');
    }


    /**
     * Get the user associated with the UserRelations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userBasicInfos(): HasOne
    {
        return $this->hasOne(UserBasicInfoMaster::class, 'user_id', 'id');
    }

    /**
     * Get the user associated with the UserRelations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userProfessinalInfos(): HasOne
    {
        return $this->hasOne(UserProfessionalMaster::class, 'user_id', 'id');
    }

    /**
     * Get the user associated with the UserRelations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userPreferrenceInfo(): HasOne
    {
        return $this->hasOne(UserPreferenceInfo::class, 'user_id', 'id');
    }
    /**
     * Get the user associated with the UserRelations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function BasicPartnerInfo(): HasOne
    {
        return $this->hasOne(UserPreferenceInfo::class, 'user_id', 'id');
    }

    /**
     * Get the user associated with the UserRelations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ShortListInfo(): HasMany
    {
        return $this->hasMany(UserShortListInfoMaster::class, 'user_id', 'id');
    }
    public function UserLogInfo(): HasMany
    {
        return $this->hasMany(UserLog::class, 'user_id', 'id');
    }
    public function ProfileMatchInfo(): HasMany
    {
        return $this->hasMany(ProfileMatchMaster::class, 'user_id', 'id');
    }
    public function TransactionInfo(): HasMany
    {
        return $this->hasMany(UserTransaction::class, 'user_id', 'id');
    }
}
