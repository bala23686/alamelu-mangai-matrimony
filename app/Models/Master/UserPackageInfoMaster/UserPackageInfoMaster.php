<?php

namespace App\Models\Master\UserPackageInfoMaster;

use App\Models\Master\PackageMaster\PackageMaster;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPackageInfoMaster extends Model
{
    use HasFactory;

    protected $table = "user_package_info_masters";


    protected $with = ['Package'];

    protected $fillable = [
        'user_views_remaining',
        'user_package_id',
        'user_views_remaining',
        'photo_upload_remaining',
        'interest_remaining',
        'expires_on',
        'is_expired',
    ];



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'expires_on' => 'date:d-m-Y',
    ];




    /**
     * Get the user associated with the UserRelations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Package(): HasOne
    {
        return $this->hasOne(PackageMaster::class, 'id', 'user_package_id');
    }

    public function PackageInfo(): HasOne
    {
        return $this->hasOne(PackageMaster::class, 'id', 'user_package_id');
    }


    /**
     * Get the user that owns the UserPackageInfoMaster
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
