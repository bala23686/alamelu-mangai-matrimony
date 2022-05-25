<?php

namespace App\Models\Master\CountryMaster;

use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountryMaster extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'country_name',
        'country_status'
    ];

    public function gender(): HasOne
    {
        return $this->hasOne(UserNativeInfoMaster::class, 'user_country_id', 'id');
    }
}
