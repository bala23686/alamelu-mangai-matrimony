<?php

namespace Database\Factories\Master\UserNativeInfoMaster;

use App\Models\Master\UserNativeInfoMaster\UserNativeInfoMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserNativeInfoMasterFactory extends Factory
{


    protected $model=UserNativeInfoMaster::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_country_id"=>rand(1,3),
            "user_state_id"=>rand(1,4),
            "user_city_id"=>rand(1,10)
        ];
    }
}
