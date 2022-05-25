<?php

namespace App\Models\Master\UserPreferenceInfoMaster;

use App\Casts\ComplexionCasts;
use App\Casts\CountryCasts;
use App\Casts\LangauageCasts;
use App\Casts\PreferrenceEducationCasts;
use App\Casts\PreferrenceJobCasts;
use App\Casts\RasiCasts;
use App\Models\Master\CasteMaster\CasteMaster;
use App\Models\Master\CityMaster\CityMaster;
use App\Models\Master\CountryMaster\CountryMaster;
use App\Models\Master\EducationMaster\EducationMaster;
use App\Models\Master\HeightMaster\HeightMaster;
use App\Models\Master\JobMaster\JobMaster;
use App\Models\Master\LanguageMaster\LanguageMaster;
use App\Models\Master\RasiMaster\RasiMaster;
use App\Models\Master\ReligionMaster\ReligionMaster;
use App\Models\Master\StarMaster\StarMaster;
use App\Models\Master\StateMaster\StateMaster;
use App\Models\SubMaster\ComplexionSubMaster\ComplexionSubMaster;
use App\Models\SubMaster\MartialStatusSubMaster\MartialStatusSubMaster;
use App\Models\SubMaster\SalarySubMaster\SalarySubMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\This;

class UserPreferenceInfo extends Model
{

    use HasFactory;

    protected $table = "user_preference_infos";

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'partner_age_from',
        'partner_age_to',
        'partner_height_to',
        'partner_height_from',
        'partner_martial_status',
        'partner_complexion',
        'partner_mother_tongue',
        'partner_job',
        'partner_job_details',
        'partner_education',
        'partner_job_country',
        'partner_education_details',
        'partner_salary',
        'partner_religion',
        'partner_religion',
        'partner_caste',
        'partner_rasi',
        'partner_country',
        'caste_no_bar'

    ];


    protected $casts = [
        "partner_complexion" => ComplexionCasts::class,
        "partner_mother_tongue" => LangauageCasts::class,
        "partner_education" => PreferrenceEducationCasts::class,
        "partner_job" => PreferrenceJobCasts::class,
        "partner_country" => CountryCasts::class,
        "partner_job_country" => CountryCasts::class,
        "partner_rasi" => RasiCasts::class,
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
    public function HeightTo(): HasOne
    {
        return $this->hasOne(HeightMaster::class, 'id', 'partner_height_to');
    }
    public function HeightFrom(): HasOne
    {
        return $this->hasOne(HeightMaster::class, 'id', 'partner_height_from');
    }
    public function MartialStatus(): HasOne
    {
        return $this->hasOne(MartialStatusSubMaster::class, 'id', 'partner_martial_status');
    }
    public function Complexion(): HasOne
    {
        return $this->hasOne(ComplexionSubMaster::class, 'id', 'partner_complexion');
    }
    public function Language(): HasOne
    {
        return $this->hasOne(LanguageMaster::class, 'id', 'partner_mother_tongue');
    }
    public function Job(): HasOne
    {
        return $this->hasOne(JobMaster::class, 'id', 'partner_job');
    }

    public function Education(): HasOne
    {
        return $this->hasOne(EducationMaster::class, 'id', 'partner_education');
    }

    public function partnerEducation(): HasMany
    {
        return $this->hasMany(EducationMaster::class, 'id', 'partner_education');
    }


    public function Salary(): HasOne
    {
        return $this->hasOne(SalarySubMaster::class, 'id', 'partner_salary');
    }
    public function Religion(): HasOne
    {
        return $this->hasOne(ReligionMaster::class, 'id', 'partner_religion');
    }
    public function Caste(): HasOne
    {
        return $this->hasOne(CasteMaster::class, 'id', 'partner_caste');
    }
    public function Star(): HasOne
    {
        return $this->hasOne(StarMaster::class, 'id', 'partner_star');
    }
    public function Rasi(): HasOne
    {
        return $this->hasOne(RasiMaster::class, 'id', 'partner_rasi');
    }
    public function Country(): HasOne
    {
        return $this->hasOne(CountryMaster::class, 'id', 'partner_country');
    }
    public function State(): HasOne
    {
        return $this->hasOne(StateMaster::class, 'id', 'partner_state');
    }
    public function City(): HasOne
    {
        return $this->hasOne(CityMaster::class, 'id', 'partner_city');
    }
}
