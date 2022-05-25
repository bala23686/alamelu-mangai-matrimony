<?php

namespace App\Models\Master\UserShortListInfoMaster;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserShortListInfoMaster extends Model
{
    use HasFactory;

    public function userShortListInfo()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function ShortlistBasicInfo()
    {
        return $this->hasOne(UserBasicInfoMaster::class, 'id', 'user_id');
    }
    public function ShortlistPlaceInfo()
    {
        return $this->hasOne(UserNativeInfoMaster::class, 'id', 'user_id');
    }
}
