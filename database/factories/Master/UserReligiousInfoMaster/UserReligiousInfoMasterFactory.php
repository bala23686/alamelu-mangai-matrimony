<?php

namespace Database\Factories\Master\UserReligiousInfoMaster;

use App\Models\Master\UserReligiousInfoMaster\UserReligiousInfoMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserReligiousInfoMasterFactory extends Factory
{

    protected $model=UserReligiousInfoMaster::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          "user_religion_id"=>1,
          "user_caste_id"=>rand(1,7),
          "sub_caste"=>$this->faker->sentence(),
          "user_rasi_id"=>rand(1,9),
          "user_star_id"=>rand(1,25),
          "dhosam"=>rand(0,1),
          "user_birth_time"=>$this->faker->dateTime(),
          "user_birth_place"=>$this->faker->city(),
        ];
    }
}
