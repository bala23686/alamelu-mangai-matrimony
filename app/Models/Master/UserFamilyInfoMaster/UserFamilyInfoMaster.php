<?php

namespace App\Models\Master\UserFamilyInfoMaster;

use App\Models\SubMaster\FamilyStatusSubMaster\FamilyStatusSubMaster;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserFamilyInfoMaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_father_name',
        'user_father_job_details',
        'user_mother_name',
        'user_mother_job_details',
        'no_of_sibling',
        'no_of_brothers',
        'no_of_sisters',
        'no_of_brothers_married',
        'no_of_sisters_married',
        'user_sibling_details',
        'paternal_uncle_address',
        'user_family_status'
    ];






    public function FamilyStatusSubMaster(): HasOne
    {
        return $this->hasOne(FamilyStatusSubMaster::class, 'id', 'user_family_status');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_family_status');
    }
}
