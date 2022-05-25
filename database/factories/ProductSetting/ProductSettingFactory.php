<?php

namespace Database\Factories\ProductSetting;

use App\Models\ProductSetting\ProductSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSettingFactory extends Factory
{


    protected $model=ProductSetting::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'setting_name'=>$this->faker->unique()->jobTitle,
        ];
    }
}
