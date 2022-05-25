<?php

namespace Database\Seeders;

use App\Models\Master\CityMaster\CityMaster;
use Illuminate\Database\Seeder;

class CityMasterSeeder extends Seeder
{

    public $city_master_list = [
        ["city_name" => "Chennai", "state_id" => 1],
        ["city_name" => "Madurai", "state_id" => 1],
        ["city_name" => "Trichy", "state_id" => 1],
        ["city_name" => "Dindugal", "state_id" => 1],
        ["city_name" => "kaniyakumari", "state_id" => 1],
        ["city_name" => "dummy city-1", "state_id" => 2],
        ["city_name" => "dummy city-2", "state_id" => 2],
        ["city_name" => "test city-1", "state_id" => 3],
        ["city_name" => "test city-2", "state_id" => 3],
        ["city_name" => "lorem city-1", "state_id" => 4],
        ["city_name" => "lorem city-2", "state_id" => 4],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->city_master_list); $i < $length; $i++) {
            $city = new CityMaster();
            $city->city_name = $this->city_master_list[$i]['city_name'];
            $city->state_id = $this->city_master_list[$i]['state_id'];
            $city->save();
        }
    }
}
