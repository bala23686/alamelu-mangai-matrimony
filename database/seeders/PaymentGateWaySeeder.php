<?php

namespace Database\Seeders;

use App\Models\Payment\PaymentGateWay;
use Illuminate\Database\Seeder;

class PaymentGateWaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentGateWay::create([
            'payment_gateway_name'=>'PayU Money',
            'key'=>'gtKFFx',
            'salt'=>'wia56q6O',
            'checkout_url'=>'https://test.payu.in/_payment',
        ]);
    }
}
