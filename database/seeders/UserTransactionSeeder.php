<?php

namespace Database\Seeders;

use App\Models\UserTransaction\UserTransaction;
use Illuminate\Database\Seeder;

class UserTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserTransaction::factory()->count(100)->create();
    }
}
