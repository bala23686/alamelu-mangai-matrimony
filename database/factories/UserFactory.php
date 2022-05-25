<?php

namespace Database\Factories;

use App\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'username' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phonenumber' => $this->faker->unique()->phoneNumber(),
            'email_verified_at' => now(),
            'profile_status_id' => rand(1,4),
            'user_profile_id' => "TM".now()->year.now()->month.$this->faker->randomNumber(4),
            'is_verified' => rand(0,1),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
