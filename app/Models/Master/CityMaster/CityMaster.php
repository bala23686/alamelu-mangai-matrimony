<?php

namespace App\Models\Master\CityMaster;

use App\Models\Master\StateMaster\StateMaster;
use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityMaster extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'city_masters';

    protected $fillable = [

        'city_name',
        'city_status',
        'state_id',
    ];


    public function State()
    {
        return $this->belongsTo(StateMaster::class, 'state_id', 'id');
    }

    public function NativeState(): HasOne
    {
        return $this->hasOne(UserNativeInfoMaster::class, 'user_state_id', 'id');
    }
}
