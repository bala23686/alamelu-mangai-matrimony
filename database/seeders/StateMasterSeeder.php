<?php

namespace Database\Seeders;

use App\Models\Master\StateMaster\StateMaster;
use Illuminate\Database\Seeder;

class StateMasterSeeder extends Seeder
{

    public $state_master_list = [
        ["state_name"=>"Tamil Nadu","country_id"=>1],
        ["state_name"=>"Andhra Pradesh","country_id"=>1],
        ["state_name"=>"Uttar Pradesh","country_id"=>1],
        ["state_name"=>"Karnataka","country_id"=>1],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0, $length = count($this->state_master_list); $i < $length; $i++) {
            $state = new StateMaster();
            $state->state_name = $this->state_master_list[$i]['state_name'];
            $state->country_id = $this->state_master_list[$i]['country_id'];
            $state->save();
        }
    }
}
