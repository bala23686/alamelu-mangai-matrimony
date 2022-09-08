<?php

namespace App\Models\Master\UserHoroscopeInfoMaster;

use App\Casts\HeroScopeCasts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHoroscopeInfoMaster extends Model
{
    use HasFactory;


    public const JATHAKAM_IMAGE_PATH = '/Users/jathakamImage/';
    protected $appends = ['image_full_path'];

    protected $fillable = [
        'user_jathakam_katam_info',
        'rasi_katam_row_1_col_1',
        'rasi_katam_row_1_col_2',
        'rasi_katam_row_1_col_3',
        'rasi_katam_row_1_col_4',
        'rasi_katam_row_2_col_1',
        'rasi_katam_row_2_col_4',
        'rasi_katam_row_3_col_1',
        'rasi_katam_row_3_col_4',
        'rasi_katam_row_4_col_1',
        'rasi_katam_row_4_col_2',
        'rasi_katam_row_4_col_3',
        'rasi_katam_row_4_col_4',
        'navam_katam_row_1_col_1',
        'navam_katam_row_1_col_2',
        'navam_katam_row_1_col_3',
        'navam_katam_row_1_col_4',
        'navam_katam_row_2_col_1',
        'navam_katam_row_2_col_4',
        'navam_katam_row_3_col_1',
        'navam_katam_row_3_col_4',
        'navam_katam_row_4_col_1',
        'navam_katam_row_4_col_2',
        'navam_katam_row_4_col_3',
        'navam_katam_row_4_col_4',
        'user_jathakam_image',
        'user_jathakam_rasi_katam_is_filled',
        'user_jathakam_navamsam_katam_is_filled',
        'user_jathakam_image_is_uploaded',

    ];

    protected $casts = [
        "rasi_katam_row_1_col_1" => HeroScopeCasts::class,
        "rasi_katam_row_1_col_2" => HeroScopeCasts::class,
        "rasi_katam_row_1_col_3" => HeroScopeCasts::class,
        "rasi_katam_row_1_col_4" => HeroScopeCasts::class,
        "rasi_katam_row_2_col_1" => HeroScopeCasts::class,
        "rasi_katam_row_2_col_4" => HeroScopeCasts::class,
        "rasi_katam_row_3_col_1" => HeroScopeCasts::class,
        "rasi_katam_row_3_col_4" => HeroScopeCasts::class,
        "rasi_katam_row_4_col_1" => HeroScopeCasts::class,
        "rasi_katam_row_4_col_2" => HeroScopeCasts::class,
        "rasi_katam_row_4_col_3" => HeroScopeCasts::class,
        "rasi_katam_row_4_col_4" => HeroScopeCasts::class,
        "navam_katam_row_1_col_1" => HeroScopeCasts::class,
        "navam_katam_row_1_col_2" => HeroScopeCasts::class,
        "navam_katam_row_1_col_3" => HeroScopeCasts::class,
        "navam_katam_row_1_col_4" => HeroScopeCasts::class,
        "navam_katam_row_2_col_1" => HeroScopeCasts::class,
        "navam_katam_row_2_col_4" => HeroScopeCasts::class,
        "navam_katam_row_3_col_1" => HeroScopeCasts::class,
        "navam_katam_row_3_col_4" => HeroScopeCasts::class,
        "navam_katam_row_4_col_1" => HeroScopeCasts::class,
        "navam_katam_row_4_col_2" => HeroScopeCasts::class,
        "navam_katam_row_4_col_3" => HeroScopeCasts::class,
        "navam_katam_row_4_col_4" => HeroScopeCasts::class,

    ];


    /**
     * Get the user's jathakam full image path.
     *
     * @return string
     */
    public function getImageFullPathAttribute()
    {
        return url('/') . '/uploads' . UserHoroscopeInfoMaster::JATHAKAM_IMAGE_PATH . $this->user_jathakam_image;
    }
}
