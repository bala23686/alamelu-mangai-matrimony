<?php

namespace Database\Factories\Master\UserPackageInfoMaster;

use App\Models\Master\UserPackageInfoMaster\UserPackageInfoMaster;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPackageInfoMasterFactory extends Factory
{

    protected $model = UserPackageInfoMaster::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_views_remaining' => rand(1, 50),
            'user_package_id' =>1
        ];
    }
}
