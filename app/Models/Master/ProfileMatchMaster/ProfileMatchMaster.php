<?php

namespace App\Models\Master\ProfileMatchMaster;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMatchMaster extends Model
{
    use HasFactory;
    public function MatchedProfileInfo()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function MatchedProfileBasicInfo()
    {
        return $this->hasOne(UserBasicInfoMaster::class, 'id', 'user_id');
    }
    public function MatchedProfilePlaceInfo()
    {
        return $this->hasOne(UserNativeInfoMaster::class, 'id', 'user_id');
    }
}
