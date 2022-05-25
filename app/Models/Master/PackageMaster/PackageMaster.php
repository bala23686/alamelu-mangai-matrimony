<?php

namespace App\Models\Master\PackageMaster;

use App\Http\Controllers\Website\PackageInfo\PackageInfoController;
use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageMaster extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'package_name',
        'package_allowed_profile',
        'package_status',
        'package_photo_upload',
        'package_valid_for',
        'package_interest_allowed',
        'package_price',
    ];
    public function UserPackageInfos(): HasOne
    {
        return $this->hasOne(UserPackageInfoMaster::class, 'user_package_id', 'id');
    }
}
