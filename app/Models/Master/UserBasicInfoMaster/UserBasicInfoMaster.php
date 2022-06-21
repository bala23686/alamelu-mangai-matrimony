<?php

namespace App\Models\Master\UserBasicInfoMaster;

use App\Models\Master\GenderMaster\GenderMaster;
use App\Models\Master\HeightMaster\HeightMaster;
use App\Models\Master\LanguageMaster\LanguageMaster;
use App\Models\Master\ReligionMaster\ReligionMaster;
use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use App\Models\Master\UserProfessionalMaster\UserProfessionalMaster;
use App\Models\Master\UserReligiousInfoMaster\UserReligiousInfoMaster;
use App\Models\SubMaster\ComplexionSubMaster\ComplexionSubMaster;
use App\Models\SubMaster\EatingHabitSubMaster\EatingHabitSubMaster;
use App\Models\SubMaster\MartialStatusSubMaster\MartialStatusSubMaster;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserBasicInfoMaster extends Model
{
    use HasFactory;

    const USER_PROFILE_IMAGE_PATH = "/Users/ProfileImage/";
    const USER_MEDICAL_CERIFICATE_IMAGE_PATH = "/Users/MedicalCertificate/";
    const USER_TENTH_CERIFICATE_IMAGE_PATH = "/Users/TenthCertificate/";
    const USER_TWELTH_CERIFICATE_IMAGE_PATH = "/Users/TwelthCertificate/";
    const USER_CLG_TC_IMAGE_PATH = "/Users/ClgTc/";
    const USER_ADHAR_IMAGE_PATH = "/Users/adharcard/";

    protected $table = "user_basic_info_masters";

    protected $appends = ['image_with_path'];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'user_full_name',
        'user_mobile_no',
        'blood_group',
        'user_profile_image',
        'dob',
        'age',
        'is_tenth_passed',
        'adhard_card_no',
        'adhard_card_image',
        'adhard_card_image_is_uploaded',
        'medical_certificate',
        'medical_certificate_uploaded_on',
        'tenth_marksheet',
        'tenth_mark_sheet_uploaded',
        'twelth_marksheet',
        'twelth_mark_sheet_uploaded',
        'clg_tc',
        'clg_tc_is_uploaded',
        'about',
        'user_address',
        'gender_id',
        'user_height_id',
        'user_mother_tongue',
        'martial_id',
        'user_eating_habit_id',
        'user_complexion_id',
        'is_disable',
        'profile_basic_status',
        'profile_religion_status',
        'profile_location_status',
        'profile_pro_info_status',
        'profile_fam_info_status',
        'profile_jakt_info_status',
        'profile_pref_info_status'
    ];



    public function getImageWithPathAttribute()
    {
        return ($this->user_profile_image) ? Url('/') . "/uploads" . self::USER_PROFILE_IMAGE_PATH . "{$this->user_profile_image}" : null;
    }

    public function getMedicalCertificateWithPathAttribute()
    {
        return ($this->medical_certificate_uploaded_on) ? Url('/') . "/uploads" . self::USER_MEDICAL_CERIFICATE_IMAGE_PATH . "{$this->medical_certificate}" : null;
    }

    public function getTenthCertificateWithPathAttribute()
    {
        return ($this->tenth_mark_sheet_uploaded) ? Url('/') . "/uploads" . self::USER_TENTH_CERIFICATE_IMAGE_PATH . "{$this->tenth_marksheet}" : null;
    }

    public function getTwelthCertificateWithPathAttribute()
    {
        return ($this->twelth_mark_sheet_uploaded) ? Url('/') . "/uploads" . self::USER_TWELTH_CERIFICATE_IMAGE_PATH . "{$this->twelth_marksheet}" : null;
    }

    public function getCollegeTcWithPathAttribute()
    {
        return ($this->clg_tc_is_uploaded) ? Url('/') . "/uploads" . self::USER_CLG_TC_IMAGE_PATH . "{$this->clg_tc}" : null;
    }


    public function getadharImageWithPathAttribute()
    {
        return ($this->adhard_card_image) ? Url('/') . "/uploads" . self::USER_ADHAR_IMAGE_PATH . "{$this->adhard_card_image}" : null;
    }
    /**
     * Get the user associated with the UserBasicInfoMaster
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Gender(): HasOne
    {
        return $this->hasOne(GenderMaster::class, 'id', 'gender_id');
    }


    /**
     * Get the user associated with the UserBasicInfoMaster
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function MartialStatus(): HasOne
    {
        return $this->hasOne(MartialStatusSubMaster::class, 'id', 'martial_id');
    }

    /**
     * Get the user associated with the LanguageMaster
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function MotherTongue(): HasOne
    {
        return $this->hasOne(LanguageMaster::class, 'id', 'user_mother_tongue');
    }

    /**
     * Get the user associated with the ComplexionSubMaster
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Complex(): HasOne
    {
        return $this->hasOne(ComplexionSubMaster::class, 'id', 'user_complexion_id');
    }


    /**
     * Get the user associated with the UserBasicInfoMaster
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Height(): HasOne
    {
        return $this->hasOne(HeightMaster::class, 'id', 'user_height_id');
    }


    /**
     * Get the user associated with the UserBasicInfoMaster
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function EatingHabit(): HasOne
    {
        return $this->hasOne(EatingHabitSubMaster::class, 'id', 'user_eating_habit_id');
    }


    /**
     * Get the user that owns the UserBasicInfoMaster
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user_info()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function religious_info()
    {
        return $this->hasOne(UserReligiousInfoMaster::class, 'user_id', 'user_id');
    }
    public function professional_info()
    {
        return $this->hasOne(UserProfessionalMaster::class, 'user_id', 'user_id');
    }
    public function native_info()
    {
        return $this->hasOne(UserNativeInfoMaster::class, 'user_id', 'user_id');
    }

    public function genderInfo(): BelongsTo
    {
        return $this->belongsTo(GenderMaster::class, 'gender_id', 'id');
    }
}
