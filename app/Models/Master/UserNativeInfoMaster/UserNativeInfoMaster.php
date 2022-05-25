<?php

namespace App\Models\Master\UserNativeInfoMaster;

use App\Models\Master\CityMaster\CityMaster;
use App\Models\Master\CountryMaster\CountryMaster;
use App\Models\Master\StateMaster\StateMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserNativeInfoMaster extends Model
{
    use HasFactory;

    protected $table = "user_native_info_masters";

    protected $fillable = [
        'user_country_id',
        'user_state_id',
        'user_city_id',
    ];

    public function userCountry()
    {
        return $this->hasOne(CountryMaster::class, 'id', 'user_country_id');
    }

    public function userState()
    {
        return $this->hasOne(StateMaster::class, 'id', 'user_state_id');
    }

    public function userCity()
    {
        return $this->hasOne(CityMaster::class, 'id', 'user_city_id');
    }

    public function Country()
    {
        return $this->belongsTo(CountryMaster::class,'user_country_id','id');
    }

    public function State()
    {
        return $this->belongsTo(StateMaster::class,'user_state_id','id');
    }

    public function City()
    {
        return $this->belongsTo(CityMaster::class,'user_city_id','id');
    }
}
