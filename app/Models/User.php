<?php

namespace App\Models;

use App\Models\Master\ProfileStatus\ProfileStatus;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserFamilyInfoMaster\UserFamilyInfoMaster;
use App\Models\Master\UserHoroscopeInfoMaster\UserHoroscopeInfoMaster;
use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use App\Models\Master\UserProfessionalMaster\UserProfessionalMaster;
use App\Models\Master\UserReligiousInfoMaster\UserReligiousInfoMaster;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Model\User\UserRelations;

use Illuminate\Database\Eloquent\Relations\HasOne;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UserRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'phonenumber',
        'password',
        'profile_status_id',
        'is_admin',
        'is_verified',
        'user_profile_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'date:d-m-Y',
    ];


    public function userBasicInfos()
    {
        return $this->hasOne(UserBasicInfoMaster::class, 'user_id', 'id');
    }

    public function userReligionInfo(): HasOne
    {
        return $this->hasOne(UserReligiousInfoMaster::class, 'user_id', 'id');
    }

    public function UserNativeInfo()
    {
        return $this->hasOne(UserNativeInfoMaster::class, 'user_id', 'id');
    }

    public function UserProfessionInfo()
    {
        return $this->hasOne(UserProfessionalMaster::class, 'user_id', 'id');
    }

    public function UserFamilyInfo()
    {
        return $this->hasOne(UserFamilyInfoMaster::class, 'user_id', 'id');
    }

    public function UserPreferenceInfo()
    {
        return $this->hasOne(UserPreferenceInfo::class, 'user_id', 'id');
    }

    public function UserHoroscopeInfo()
    {
        return $this->hasOne(UserHoroscopeInfoMaster::class, 'user_id', 'id');
    }
}
