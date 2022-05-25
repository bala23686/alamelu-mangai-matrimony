<?php

namespace Database\Factories\Master\UserHoroscopeInfoMaster;

use App\Models\Master\UserHoroscopeInfoMaster\UserHoroscopeInfoMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserHoroscopeInfoMasterFactory extends Factory
{


    protected $model=UserHoroscopeInfoMaster::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_jathakam_katam_info'=>$this->faker->sentence(),
            'user_jathakam_image'=>$this->faker->imageUrl()
        ];
    }
}
