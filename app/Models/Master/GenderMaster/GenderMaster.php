<?php

namespace App\Models\Master\GenderMaster;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class GenderMaster extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['gender_name', 'gender_status'];

    public function gender(): HasOne
    {
        return $this->hasOne(UserBasicInfoMaster::class, 'gender_id', 'id');
    }
}
