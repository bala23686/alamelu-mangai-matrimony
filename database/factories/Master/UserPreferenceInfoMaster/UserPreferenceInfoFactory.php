<?php

namespace Database\Factories\Master\UserPreferenceInfoMaster;

use App\Models\Master\UserPreferenceInfoMaster\UserPreferenceInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPreferenceInfoFactory extends Factory
{


    protected $model = UserPreferenceInfo::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "partner_age_from"=>rand(18,60),
            "partner_age_to"=>rand(18,60),
            "partner_height_to"=>rand(6,10),
            "partner_height_from"=>rand(6,10),
            "partner_martial_status"=>rand(1,4),
            "partner_complexion"=>rand(1,3),
            "partner_mother_tongue"=>rand(1,2),
            "partner_job"=>rand(1,5),
            "partner_education"=>rand(1,2),
            "partner_salary"=>rand(50000,500000),
            "partner_religion"=>rand(1,3),
            "partner_caste"=>rand(1,12),
            "partner_rasi"=>rand(1,20),
            "partner_country"=>rand(1,3),

        ];
    }
}
