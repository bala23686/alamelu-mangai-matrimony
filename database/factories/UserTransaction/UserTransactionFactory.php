<?php

namespace Database\Factories\UserTransaction;

use App\Models\UserTransaction\UserTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserTransactionFactory extends Factory
{

    protected $model=UserTransaction::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "tr_id"=>"TRID".rand(9999,99999),
            "user_id"=>rand(2,99),
            "tr_package_name"=>$this->faker->randomElement(['Simple Package','hero package','premium package']),
            "tr_package_price"=>$this->faker->randomElement(['1000','2000','5000']),
            "tr_amount_paid"=>$this->faker->randomElement(['1000','2000','5000']),
            "tr_package_views"=>$this->faker->randomElement(['1000','2000','5000']),
            "tr_package_photo_upload"=>$this->faker->randomElement(['1000','2000','5000']),
            "tr_package_interest"=>$this->faker->randomElement(['1000','2000','5000']),
            "tr_mode"=>$this->faker->randomElement(['1','2']),
            "tr_date"=>$this->faker->date(),
            "tr_invoice_pdf"=>'testInvoice.pdf',
        ];
    }
}
