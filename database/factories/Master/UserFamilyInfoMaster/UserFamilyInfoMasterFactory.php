<?php

namespace Database\Factories\Master\UserFamilyInfoMaster;

use App\Models\Master\UserFamilyInfoMaster\UserFamilyInfoMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFamilyInfoMasterFactory extends Factory
{


    protected $model=UserFamilyInfoMaster::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_father_name'=>$this->faker->firstNameMale(),
            'user_father_job_details'=>$this->faker->sentence(),
            'user_mother_name'=>$this->faker->firstNameFemale(),
            'user_mother_job_details'=>$this->faker->sentence(),
            'user_family_status'=>rand(1,4),
            'no_of_sibling'=>rand(1,4),
            'no_of_brothers'=>rand(1,4),
            'no_of_sisters'=>rand(1,4),
            'no_of_brothers_married'=>rand(1,4),
            'no_of_sisters_married'=>rand(1,4),
            'user_sibling_details'=>$this->faker->firstNameMale(),
        ];
    }
}
