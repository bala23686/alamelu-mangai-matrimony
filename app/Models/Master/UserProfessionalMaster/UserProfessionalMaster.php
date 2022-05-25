<?php

namespace App\Models\Master\UserProfessionalMaster;

use App\Casts\ProfessionMasterCaste\EducationCaste;
use App\Models\Master\CityMaster\CityMaster;
use App\Models\Master\CountryMaster\CountryMaster;
use App\Models\Master\EducationMaster\EducationMaster;
use App\Models\Master\JobMaster\JobMaster;
use App\Models\Master\StateMaster\StateMaster;
use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use App\Models\SubMaster\SalarySubMaster\SalarySubMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfessionalMaster extends Model
{
    use HasFactory;

    protected $table = "user_professional_masters";

    protected $fillable =
    [
        'user_id',
        'user_education_id',
        'user_education_details',
        'tenth_marksheet',
        'twelth_marksheet',
        'clg_tc',
        'clg_tc_is_uploaded',
        'user_job_id',
        'user_job_details',
        'user_job_country',
        'user_job_state',
        'user_job_city',
        'user_annual_income',

    ];


    protected $casts = [
        "user_education_id" => EducationCaste::class
    ];

        /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
    public function userBasicInfo(): BelongsTo
    {
        return $this->belongsTo(UserBasicInfoMaster::class, 'user_id', 'user_id');
    }

    public function Education(): HasOne
    {
        return $this->hasOne(EducationMaster::class, 'id', 'user_education_id');
    }

    public function Job(): HasOne
    {
        return $this->hasOne(JobMaster::class, 'id', 'user_job_id');
    }

    public function JobCountry(): HasOne
    {
        return $this->hasOne(CountryMaster::class, 'id', 'user_job_country');
    }

    public function JobState(): HasOne
    {
        return $this->hasOne(StateMaster::class, 'id', 'user_job_state');
    }

    public function JobCity(): HasOne
    {
        return $this->hasOne(CityMaster::class, 'id', 'user_job_city');
    }

    public function AnnualIncome(): HasOne
    {
        return $this->hasOne(SalarySubMaster::class, 'id', 'user_annual_income');
    }
}
