<?php

namespace Database\Factories\Master\UserBasicInfoMaster;

use App\Models\Master\UserBasicInfoMaster\UserBasicInfoMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserBasicInfoMasterFactory extends Factory
{


    protected $model = UserBasicInfoMaster::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_full_name' => $this->faker->userName(),
            'user_mobile_no' => $this->faker->phoneNumber(),
            'dob' => $this->faker->date(),
            'age' => rand(21, 50),
            'gender_id' => rand(1, 2),
            'user_height_id' => rand(1, 37),
            'user_mother_tongue' => rand(1, 2),
            'martial_id' => rand(1, 4),
            'user_eating_habit_id' => 1,
            'user_complexion_id' => rand(1, 3),
            'is_disable' => rand(0, 1),
            'profile_basic_status' => rand(0, 1),
            // 'profile_pref_info_status' => rand(0, 1)
        ];
    }
}
