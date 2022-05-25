<?php

namespace Database\Seeders;

use App\Models\Master\CountryMaster\CountryMaster;
use Illuminate\Database\Seeder;

class CountryMasterSeeder extends Seeder
{
    public $country_master_list = [
        'India',
        'Australia',
        'USA',
        'UK',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->country_master_list); $i < $length; $i++) {
            $country = new CountryMaster();
            $country->country_name= $this->country_master_list[$i];
            $country->save();
        }
    }
}
