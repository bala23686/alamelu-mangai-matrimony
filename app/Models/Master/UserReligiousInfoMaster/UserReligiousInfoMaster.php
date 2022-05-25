<?php

namespace App\Models\Master\UserReligiousInfoMaster;

use App\Models\Master\CasteMaster\CasteMaster;
use App\Models\Master\RasiMaster\RasiMaster;
use App\Models\Master\ReligionMaster\ReligionMaster;
use App\Models\Master\StarMaster\StarMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserReligiousInfoMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_caste',
        'dhosam',
        'dhosam_details',
        'user_birth_place',
        'user_birth_time',
        'user_religion_id',
        'user_caste_id',
        'user_rasi_id',
        'user_star_id',
    ];

    public function Religion(): HasOne
    {
        return $this->hasOne(ReligionMaster::class, 'id', 'user_religion_id');
    }
    public function Caste(): HasOne
    {
        return $this->hasOne(CasteMaster::class, 'id', 'user_caste_id');
    }
    public function Star(): HasOne
    {
        return $this->hasOne(StarMaster::class, 'id', 'user_star_id');
    }
    public function Rasi(): HasOne
    {
        return $this->hasOne(RasiMaster::class, 'id', 'user_rasi_id');
    }

    public function BelognsToReligion()
    {
        return $this->belongsTo(ReligionMaster::class,'user_religion_id','id');
    }

    public function BelongsToCaste()
    {
        return $this->belongsTo(CasteMaster::class,'user_caste_id','id');
    }

    public function BelongsToRasi()
    {
        return $this->belongsTo(RasiMaster::class,'user_rasi_id','id');
    }

    public function BelongsToStar()
    {
        return $this->belongsTo(StarMaster::class,'user_star_id','id');
    }

}
