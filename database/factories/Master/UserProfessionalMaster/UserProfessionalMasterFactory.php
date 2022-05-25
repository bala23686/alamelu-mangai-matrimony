<?php

namespace Database\Factories\Master\UserProfessionalMaster;

use App\Models\Master\UserProfessionalMaster\UserProfessionalMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfessionalMasterFactory extends Factory
{


    protected $model=UserProfessionalMaster::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_education_id'=>rand(1,6),
            'user_education_details'=>$this->faker->sentence(),
            'user_job_id'=>rand(1,6),
            'user_job_details'=>$this->faker->sentence(),
            'user_job_country'=>1,
            'user_job_state'=>1,
            'user_job_city'=>rand(1,4),
            'user_annual_income'=>rand(10000,100000),
        ];
    }
}
